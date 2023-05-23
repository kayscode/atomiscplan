<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CareerPlanGoal extends Model
{
    use HasFactory;

    protected $table = "employee_career_goals_plan";
    protected $fillable =["employee_id","goal_title","year","description"];

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class,"career_goal_id","id");
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class,"employee_id","id");
    }
}
