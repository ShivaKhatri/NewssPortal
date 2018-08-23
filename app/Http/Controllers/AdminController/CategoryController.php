<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Article;
use AppHelper;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends AdminBaseController
{

    protected $base_route = 'categories.index';
    protected $view_path = 'backend.category';
    protected $setting_file = 'impact';
    protected $model;

    /**
     * ExamController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $categories=Category::all();
//dd($categories);
        return view($this->view_path . '.index', compact('categories'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category=new Category();
        $category->name=$request->name;
        $category->description=$request->description;
        $category->admin_id=Auth::user()->id;
        $category->save();
        AppHelper::flash('success', trans('Well Done! News Category Created Successfully'));

        return redirect()->route('categories.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::find($id);
        return view('backend.category.edit')->with('categories',$categories);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category=Category::find($id);
        $category->name=$request->name;
        $category->status=$request->status;
        $category->description=$request->description;
        $category->admin_id=Auth::user()->id;
        $category->save();
        AppHelper::flash('success', trans('Well Done! News Category Edited Successfully'));

        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        Category::destroy($id);
        AppHelper::flash('success', trans('Well Done! News Category Deleted Successfully'));

        return redirect()->route('categories.index');

    }

    public function status()
    {
        $id = request('url');

        $this->idExist($id);

        if ($this->model->status == 1)
            $this->model->status = 0;
        else
            $this->model->status = 1;

        $this->model->save();

        return response()->json(json_encode([
            'error' => false,
            'message' => 'success',
            'status' => $this->model->status
        ]));
    }
    protected function idExist($id)
    {
        $this->model = Category::find($id);
        return $this->model;
    }

}
