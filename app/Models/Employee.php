<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    protected $table = "employee";
    protected $fillable = ["first_name","last_name","middle_name","hard_skills",
            "soft_skills","employee_mat","ambitions", "profile_picture"];
    use HasFactory;
    use SoftDeletes;
}
