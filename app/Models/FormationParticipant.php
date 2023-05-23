<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormationParticipant extends Model
{
    use HasFactory;

    protected $table = "formation_participants";
    protected $fillable = ["applied","participate","employee_id","formation_id"];

    public function formation(): BelongsTo
    {
        return $this->belongsTo(Formation::class,'formation_id','id');
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class,"employee_id","id");
    }
}
