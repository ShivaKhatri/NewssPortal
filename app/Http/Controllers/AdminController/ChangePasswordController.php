<?php

namespace App\Http\Controllers\AdminController;

use App\Facades\AppHelper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        $data['user'] = Auth::user();
        return view('backend.reset.reset_password', compact('data'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function passwordUpdate($id, Request $request)
    {
//        dd($id, $request->all());
        if (!$this->idExist($id)) {
            AppHelper::flash('warning', trans('Invalid Request !!!'));
            return redirect()->route($this->view_path . '.change_password');
        }
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        $user = Auth::user();
        if (!Hash::check($request->get('current_password'), $user->password)) {
            AppHelper::flash('danger', trans('Current password not matched !!!'));
            return back();
        } else {

            $user->update([
                'password' => bcrypt($request->password)
            ]);
            $user->save();
            Auth::logout();

            AppHelper::flash('success', trans('Password has been changed Successfully. Please login with new password.'));
            return redirect()->route('dashboard');
        }
    }

    public function idExist($id)
    {
        $query =User::select('*');
        $query->where('id', '=', $id);
        $this->model = $query->first();

        return $this->model;
    }
}
