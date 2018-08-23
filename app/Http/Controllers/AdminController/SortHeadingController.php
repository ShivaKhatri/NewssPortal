<?php

namespace App\Http\Controllers\AdminController;

use App\Facades\AppHelper;
use App\Models\SortHeading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SortHeadingController extends AdminBaseController
{
    protected $model;
    protected $base_route = 'headings.index';
    protected $view_path = 'backend.sort_heading';

    /**
     * PostController constructor.
     */
    public function __Construct()
    {
        $this->image_url = 'assets/uploads/srotHeading/';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        $data['rows'] = SortHeading::select('id', 'title','order', 'status' , DB::raw("DATE_FORMAT(created_at,'%M %d, %Y') as date") )
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        return view($this->view_path . '.index', compact('data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view($this->view_path . '.create', compact('data'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd($request->description);
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ], $messages = [
            'required' => 'The :attribute field is required.',
        ]);
        $data=new SortHeading();
        $data->title= $request->title;
        $data->order= $request->order;
        $data->description= $request->description;
        $data->admin_id=  Auth::user()->id;
        $data->status= $request->status;
            $data->save();

        AppHelper::flash('success', trans('Well Done! News SortHeading Created Successfully'));

        return redirect()->route($this->base_route);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }
        $data = [];
        $data['row'] = $this->model;

        return view('backend.sort_heading.edit', compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }
        $data=SortHeading::find($id);
        $data->title= $request->title;
        $data->order= $request->order;

        $data->description= $request->description;
        $data->admin_id=  Auth::user()->id;
        $data->status= $request->status;
            $data->save();

        AppHelper::flash('success', trans('Well Done! News SortHeading Edited Successfully'));

        return redirect()->route($this->base_route);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }

        $data = SortHeading::find($id);
        //remove image
        if (!empty($data->image) && file_exists($this->image_url . $data->image)) {
            $file_path = $this->image_url . $data->image;

            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        SortHeading::destroy($id);
        AppHelper::flash('success', trans('Well Done! News SortHeading Deleted Successfully'));

        return redirect()->route($this->base_route);
    }

    /**
     * @param $id
     */
    public function status($id)
    {
        //
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function idExist($id)
    {
        $this->model = SortHeading::find($id);
        return $this->model;
    }
}
