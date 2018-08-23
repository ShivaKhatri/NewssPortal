<?php
namespace App\HelperClass;

use App\Models\Resource;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Input;

class AppHelper
{
    private static $roles;
    protected $cprofile;

    /**
     * Generates html according to message_type and stores in
     * session flash storage
     *
     * @param $message_type bootstrap alert message type
     * @param $message html message
     */
    public function flash($message_type, $message)
    {
        $message_type = $this->checkBootstrapAlertClass($message_type);
        $message = "<div class=\"alert alert-" . $message_type . "\">
                    <button data-dismiss=\"alert\" class=\"close\" type=\"button\">
                            <i class=\"icon-remove\"></i>
                        </button>
                        " . $message . "
                        <br>
					</div>";
        return request()->session()->flash('message', $message);
    }



    protected function checkBootstrapAlertClass($message_type)
    {
        $classes = ['info', 'success', 'warning', 'danger'];
        if (!in_array($message_type, $classes)) {
            return 'info';
        }

        return $message_type;
    }

    public function getValidationErrorMsg($errors, $field_name)
    {
        if ($errors->has($field_name)) {
            return '<strong class="help-block validation-error">' . $errors->first('caption_one') . "</strong>";
        }

        return '';
    }


    public function changeToKeyValArray($data, $key, $value)
    {
        $tmp = [];
        foreach ($data as $item) {
            $tmp[$item->$key] = $item->$value;
        }

        return $tmp;
    }

    private static function getRolesByUser(User $user)
    {
        return $user->role;
    }

    public static function isRouteAccessable($route)
    {
        if (!AppHelper::$roles)
            AppHelper::$roles = Self::getRolesByUser(User::find(Auth::user()->id));

        if(Auth::user()->utype == 'ADMIN')
        {
            return true;
        }

        if (count(AppHelper::$roles) == 0)
            return false;


        foreach (AppHelper::$roles as $role) {

            foreach ($role->resource as $resource) {

                if ($route == $resource->route) {

                    return true;

                }

            }

        }
        return false;
    }


}