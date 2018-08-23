<?php

namespace App\Http\Controllers\AdminController;

use App\Facades\AppHelper;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends AdminBaseController
{
    protected $model;
    protected $base_route = 'article.index';
    protected $view_path = 'backend.article';

    /**
     * PostController constructor.
     */
    public function __Construct()
    {
        $this->image_url = 'assets/uploads/post/';
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Article::select('id', 'title', 'status' , DB::raw("DATE_FORMAT(created_at,'%M %d, %Y') as date") )
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
//        dd($request->article);
        $this->validate($request, [
            'title' => 'required',
            'file' => 'mimes:jpg,jpeg,png|max:1024',
            'article' => 'required',
        ], $messages = [
            'required' => 'The :attribute field is required.',
            'mimes' => 'Only JPG/JPEG and PNG images are accepted!',
            'max' => 'Image Size must be less than 1024 KB'
        ]);
        $data=new Article();
        $data->title= $request->title;
        $data->article= $request->article;
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
        AppHelper::flash('success', trans('Well Done! News Article Created Successfully'));

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

        return view('backend.article.edit', compact('data'));
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
            'article' => 'required',
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
        $data=Article::find($id);
        $data->title= $request->title;
        $data->article= $request->article;
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
        AppHelper::flash('success', trans('Well Done! News Article Edited Successfully'));

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

        $data = Article::find($id);
        //remove image
        if (!empty($data->image) && file_exists($this->image_url . $data->image)) {
            $file_path = $this->image_url . $data->image;

            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }
        Article::destroy($id);
        AppHelper::flash('success', trans('Well Done! News Article Deleted Successfully'));

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
        $this->model = Article::find($id);
        return $this->model;
    }
}
