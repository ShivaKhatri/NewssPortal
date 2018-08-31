<?php

namespace App\Http\Controllers\AdminController;

use App\Facades\AppHelper;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;
    protected $base_route = 'videos.index';
    protected $view_path = 'backend.Video';

    /**
     * PostController constructor.
     */
    public function __Construct()
    {
        $this->image_url = 'assets/uploads/video/';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Video::select('id', 'name', 'status' ,'order', DB::raw("DATE_FORMAT(created_at,'%M %d, %Y') as date") )
            ->orderBy('order', 'asc')
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
//        dd($request->Video);
        $this->validate($request, [
            'name' => 'required',
            'order' => 'required',
            'file' => 'mimes:jpg,jpeg,png|max:1024',
            'description' => 'required',
        ], $messages = [
            'required' => 'The :attribute field is required.',
            'mimes' => 'Only JPG/JPEG and PNG images are accepted!',
            'max' => 'Video Size must be less than 1024 KB'
        ]);
        $data=new Video();
        $data->name= $request->name;
        $data->description= $request->description;
        $data->order= $request->order;
        $data->admin_id=  Auth::user()->id;
        $data->status= $request->status;
        $data->video =$request->video;

        $data->save();

        AppHelper::flash('success', trans('Well Done! News Video Created Successfully'));

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

        return view('backend.Video.edit', compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'file' => 'mimes:jpg,jpeg,png|max:1024',
            'order' => 'required',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only JPG/JPEG and PNG images are accepted!',
                'max' => 'Video Size must be less than 1024 KB'
            ]
        );
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }
        $data=Video::find($id);
        $data->name= $request->name;
        $data->order= $request->order;
        $data->description= $request->description;
        $data->admin_id=  Auth::user()->id;
        $data->status= $request->status;

            $data->video =$request->video;

            $data->save();

        AppHelper::flash('success', trans('Well Done! News Video Edited Successfully'));

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

        $data = Video::find($id);
        //remove video
        if (!empty($data->video) && file_exists($this->image_url . $data->video)) {
            $file_path = $this->image_url . $data->video;

            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        Video::destroy($id);
        AppHelper::flash('success', trans('Well Done! News Video Deleted Successfully'));

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
        $this->model = Video::find($id);
        return $this->model;
    }
}
