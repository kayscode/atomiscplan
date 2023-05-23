<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Formation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "formation";
    protected $fillable = ["name","description","start_date","end_date","fields","hard_skills","soft_skills","image","is_published"];

    public function participants(): HasMany
    {
        return $this->hasMany(FormationParticipant::class,"formation_id","id");
    }

    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employee::class,'formation_participants');
    }
    public function addParticipant(Employee $employee)
    {
        $participant = FormationParticipant::create([
           "formation_id"=>$this->id,
            "employee_id"=>$employee->id,
            "applied" => date("Y-m-d H:i:s"),
        ]);
    }
}
