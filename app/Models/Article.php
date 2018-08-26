<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['title','image','article','status','admin_id','category_id'];

}
