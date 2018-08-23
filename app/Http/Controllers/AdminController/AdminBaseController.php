<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 4/17/2016
 * Time: 4:33 PM
 */

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use App\Facades\AppHelper;
use Illuminate\Support\Facades\Auth;

class AdminBaseController extends AppBaseController
{
    protected $pagination_limit = 20;
    protected $image_url;

    public function __construct()
    {
        parent::__construct();
//        $this->image_url = config('impact.url.frontend.image');
        $this->image_url = config('impact.url.frontend.image');
    }

    protected function loadDefaultVars($view_path)
    {
        View::composer($view_path, function ($view) use ($view_path) {

            $view->with('image_url', $this->image_url);
            $view->with('base_route', $this->base_route);
            $view->with('trans_path', $this->makeTranslationPath($view_path));
            $view->with('pagination_limit', $this->pagination_limit);
        });

        return $view_path;
    }

    public function makeTranslationPath($view_path)
    {
        $tmp = explode('.', $view_path);
        array_pop($tmp);
        return implode('/', $tmp).'/';
    }

    protected function getArrayForDropdown($datas, $option_value, $option_text)
    {
        $tmp = [];
        foreach ($datas as $key => $data) {
            $tmp[$data->$option_value] = $data->$option_text;
        }

        return $tmp;
    }

    protected function getDetailArrayForDropdown($datas, $option_value, $option_text, $option_text2)
    {
        $tmp = [];
        foreach ($datas as $key => $data) {
            $tmp[$data->$option_value] = $data->$option_text .' | '. $data->$option_text2;
        }

        return $tmp;
    }

    protected function getThreeArrayForDropdown($datas, $option_value, $option_text, $option_text2, $option_text3)
    {
        $tmp = [];
        foreach ($datas as $key => $data) {
            $tmp[$data->$option_value] = $data->$option_text.' '. $data->$option_text2 .' | '. $data->$option_text3;
        }

        return $tmp;
    }




    protected function getArrayByKey(Collection $data, $key)
    {
        $tmp = [];
        foreach ($data as $item) {
            $tmp[] = $item->$key;
        }

        return $tmp;
    }

    protected function getDimentaion($width, $height)
    {
        if ($width > $height)
            $image_dimension = 'wide';
        elseif ($width == $height)
            $image_dimension = 'square';
        else
            $image_dimension = 'height';

        return $image_dimension;
    }

}