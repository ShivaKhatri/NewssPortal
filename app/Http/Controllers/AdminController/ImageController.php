<?php

namespace App\Http\Controllers\AdminController;

use App\Facades\AppHelper;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $model;
    protected $base_route = 'images.index';
    protected $view_path = 'backend.image';

    /**
     * PostController constructor.
     */
    public function __Construct()
    {
        $this->image_url = 'assets/uploads/image/';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Image::select('id', 'title', 'status' ,'order', DB::raw("DATE_FORMAT(created_at,'%M %d, %Y') as date") )
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
//        dd($request->Image);
        $this->validate($request, [
            'title' => 'required',
            'order' => 'required',
            'file' => 'mimes:jpg,jpeg,png|max:1024',
            'description' => 'required',
        ], $messages = [
            'required' => 'The :attribute field is required.',
            'mimes' => 'Only JPG/JPEG and PNG images are accepted!',
            'max' => 'Image Size must be less than 1024 KB'
        ]);
        $data=new Image();
        $data->title= $request->title;
        $data->description= $request->description;
        $data->order= $request->order;
        $data->admin_id=  Auth::user()->id;
        $data->status= $request->status;

        if (!file_exists($this->image_url)) {
            mkdir($this->image_url);
        }

        if ($file = $request->file('file')) {
            $file_name = str_replace(' ', '_', (rand(1857, 9899) . '_' . $file->getClientOriginalName()));
            $file->move($this->image_url, $file_name);
            $data->image = $file_name;
            $data->save();
        }
        AppHelper::flash('success', trans('Well Done! News Image Created Successfully'));

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

        return view('backend.image.edit', compact('data'));
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
            'file' => 'mimes:jpg,jpeg,png|max:1024',
            'order' => 'required',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only JPG/JPEG and PNG images are accepted!',
                'max' => 'Image Size must be less than 1024 KB'
            ]
        );
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }
        $data=Image::find($id);
        $data->title= $request->title;
        $data->order= $request->order;
        $data->description= $request->description;
        $data->admin_id=  Auth::user()->id;
        $data->status= $request->status;
        if (!file_exists($this->image_url)) {
            mkdir($this->image_url);
        }

        if ($file = $request->file('file')) {
            //remove old image if new is uploaded
            if (!empty($data->image)) {
                $file_path = $this->image_url . $data->image;

                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            //upload new image
            $file_name = str_replace(' ', '_', (rand(1857, 9899) . '_' . $file->getClientOriginalName()));
            $file->move($this->image_url, $file_name);
            $data->image = $file_name;
            $data->save();
        }
        AppHelper::flash('success', trans('Well Done! News Image Edited Successfully'));

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

        $data = Image::find($id);
        //remove image
        if (!empty($data->image) && file_exists($this->image_url . $data->image)) {
            $file_path = $this->image_url . $data->image;

            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        Image::destroy($id);
        AppHelper::flash('success', trans('Well Done! News Image Deleted Successfully'));

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
        $this->model = Image::find($id);
        return $this->model;
    }
}
