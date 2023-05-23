<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Skill extends Model
{
    use HasFactory;

    protected $table = "career_goal_skills";

    protected $fillable = [
        "name","state","skill_type","skill_access_by","actions_plan","career_goal_id"
    ];

    public function CareerPlan(): BelongsTo
    {
        return $this->belongsTo(CareerPlanGoal::class,'career_goal_id','id');
    }

}
