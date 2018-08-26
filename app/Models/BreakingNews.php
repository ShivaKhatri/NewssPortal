<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreakingNews extends Model
{
    protected $fillable=['title','description','status','image','admin_id'];

}
