<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    protected $fillable=['image','social','link','message','title','status','admin_id'];

}
