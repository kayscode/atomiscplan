<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "job_position";
    protected $fillable = ["title","position_code","year_of_experience","department","hard_skills","soft_skills"];

    public function employees(): BelongsTo
    {
        return $this->belongsTo(Employee::class,"job_id","id");
    }
}
