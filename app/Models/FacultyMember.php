<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacultyMember extends Model
{
    protected $table = 'faculty_members';

    protected $fillable = ['name', 'image', 'designation', 'title', 'message'];
}
