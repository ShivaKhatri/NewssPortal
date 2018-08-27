<?php

namespace App\Http\Controllers\AdminController;

use App\Models\FacultyMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class FacultyMemberController extends Controller
{
    protected $model;
    protected $base_route = 'member.index';
    protected $view_path = 'backend.faculty_member';

    /**
     * FacultyMemberController constructor.
     */
    public function __Construct()
    {
        $this->image_url = 'assets/uploads/members/';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['rows'] = FacultyMember::get();
        return view($this->view_path . '.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view_path . '.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $this->validate($request, [
            'name' => 'required',
            'title' => 'required',
            'file' => 'mimes:jpg,jpeg,png|max:1024|required',
            'designation' => 'required',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
                'mimes' => 'Only JPG/JPEG and PNG images are accepted!',
                'max' => 'Image Size must be less than 1024 KB'
            ]
        );

        $data['row'] = FacultyMember::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'title' => $request->title,
            'message' => $request->message,
        ]);
        if (!file_exists($this->image_url)) {
            mkdir($this->image_url);
        }
        if ($file = $request->file('file')) {
            $file_name = rand(1857, 9899) . '_' . $file->getClientOriginalName();
            $file->move($this->image_url, $file_name);
            $data['row']->image = $file_name;
            $data['row']->save();
        }

        return redirect()->route($this->base_route)->with('alert-success', 'Saved successfully');
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

        return view($this->view_path . '.edit', compact('data'));
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
            'name' => 'required',
            'designation' => 'required',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }
        $data = $this->model;

        $data->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'title' => $request->title,
            'message' => $request->message,
        ]);
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
            $file_name = rand(1857, 9899) . '_' . $file->getClientOriginalName();
            $file->move($this->image_url, $file_name);
            $data->image = $file_name;
            $data->save();
        }
        return redirect()->route($this->base_route)->with('alert-success', 'Updated Successfully');
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
        $data::destroy($id);
        return redirect()->route($this->base_route)->with('alert-success', 'Deleted Successfully');
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function idExist($id)
    {
        $this->model = FacultyMember::find($id);
        return $this->model;
    }
}
