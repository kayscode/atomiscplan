<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    protected $table = "employee";
    protected $fillable = ["first_name","last_name","middle_name","hard_skills",
            "soft_skills","employee_mat","ambitions", "profile_picture"];
    use HasFactory;
    use SoftDeletes;

    public function careerPlans(): HasMany
    {
        return $this->hasMany(CareerPlanGoal::class,"employee_id","id");
    }

    public function job(): HasOne
    {
        return $this->hasOne(Job::class,"id","job_id");
    }
}
