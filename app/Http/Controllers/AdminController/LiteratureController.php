<?php

namespace App\Http\Controllers\AdminController;

use App\Facades\AppHelper;
use App\Models\SocialNetwork;
use App\Models\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LiteratureController extends AdminBaseController
{
    protected $model;
    protected $base_route = 'literature.index';
    protected $view_path = 'backend.literature';

    /**
     * FacultyMemberController constructor.
     */
    public function __Construct()
    {
        $this->image_url = 'assets/uploads/literature/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] =Testimonials::all()->where('type','=','literature');;
        return view($this->view_path . '.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $social=SocialNetwork::all()->pluck('social_network','id')->toArray();
        return view($this->view_path . '.create', compact('data','social'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'social' => 'required',
            'title' => 'required',
            'order' => 'required',
            'file' => 'mimes:jpg,jpeg,png|max:1024|required',
            'message' => 'required|max:300',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only JPG/JPEG and PNG images are accepted!',
                'file.max' => 'Image Size must be less than 1024 KB',
                'message.max' => 'The Message length must be less than 300 Characters'
            ]
        );

        $data =new Testimonials();
        $data->title = $request->title;
            $data->message = $request->message;
            $data->social=$request->social;
            $data->link= $request->link;
            $data->type= 'literature';
            $data->order= $request->order;
        $data->status = $request->status;

        $data->admin_id = Auth::user()->id;

        if (!file_exists($this->image_url)) {
            mkdir($this->image_url);
        }
        if ($file = $request->file('file')) {
            $file_name = rand(1857, 9899) . '_' . $file->getClientOriginalName();
            $file->move($this->image_url, $file_name);
            $data->image = $file_name;
            $data->save();
        }

        AppHelper::flash('success', trans('Well Done! Literature  Created Successfully'));

        return redirect()->route($this->base_route);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }
        $data = [];
        $data['row'] = $this->model;
        $social=SocialNetwork::all()->pluck('social_network','id')->toArray();
        AppHelper::flash('success', trans('Well Done! Literature  Edited Successfully'));
        return view($this->view_path . '.edit', compact('data','social'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'social' => 'required',
            'title' => 'required',
            'order' => 'required',
            'message' => 'required|max:300',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only JPG/JPEG and PNG images are accepted!',
                'file.max' => 'Image Size must be less than 1024 KB',
                'message.max' => 'The Message length must be less than 300 Characters'
            ]
        );
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }
        $data=Testimonials::find($id);
        $data->title = $request->title;
        $data->message = $request->message;
        $data->social=$request->social;
        $data->link= $request->link;
        $data->type= 'literature';

        $data->order= $request->order;
        $data->status = $request->status;
        $data->admin_id = Auth::user()->id;

        if (!file_exists($this->image_url)) {
            mkdir($this->image_url);
        }
        if ($file = $request->file('file')) {
            $file_name = rand(1857, 9899) . '_' . $file->getClientOriginalName();
            $file->move($this->image_url, $file_name);
            $data->image = $file_name;
            $data->save();

        }
        AppHelper::flash('success', trans('Well Done! News Literature Edited Successfully'));

        return redirect()->route($this->base_route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }

        $data = $this->model;
        //remove image
        if (!empty($data->image) && file_exists($this->image_url . $data->image)) {
            $file_path = $this->image_url . $data->image;

            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        Testimonials::destroy($id);
        AppHelper::flash('success', trans('Well Done! News Literature Deleted Successfully'));

        return redirect()->route($this->base_route);
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function idExist($id)
    {
        $this->model = Testimonials::find($id);
        return $this->model;
    }
}
