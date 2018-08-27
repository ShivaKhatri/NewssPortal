<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $image_url;
    protected $model;
    protected $base_route = 'contacts.index';
    protected $view_path = 'backend.contact';

    /**
     * PageController constructor.
     */
    public function __Construct()
    {
       //
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        $data['rows'] = Contact::get();
        return view($this->view_path . '.index', compact('data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view($this->view_path . '.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = [];

        $this->validate($request, [
            'address' => 'required',
            'email' => 'required',
            'contact_no' => 'required',
        ],
            $messages = [
                'required' => 'The :attribute field is required.',
            ]
        );
        $data['row'] = Contact::create([
            'address' => $request->address,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
        ]);

        return redirect()->route($this->base_route)->with('alert-success', 'Saved successfully');
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

        return view($this->view_path. '.edit', compact('data'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }
        $data = $this->model;
        $data->update([
            'address' => $request->address,
            'email' => $request->email,
            'contact_no' => $request->contact_no,
        ]);

        return redirect()->route($this->base_route)->with('alert-success', 'Updated Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        if (!$this->idExist($id)) {
            return redirect()->route($this->base_route)->with('alert-danger', 'Invalid Id');
        }
        $data = $this->model;
        $data::destroy($id);
        return redirect()->route($this->base_route)->with('alert-success', 'Deleted Successfully');
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function idExist($id)
    {
        $this->model = Contact::find($id);
        return $this->model;
    }
}
