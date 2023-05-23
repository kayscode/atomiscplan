<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model implements Authenticatable
{
    use HasFactory, \Illuminate\Auth\Authenticatable;

    protected $table = "users";

    protected $fillable = [
      "employee_mat","password","user_type","is_activated"
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class,'employee_mat','employee_mat');
    }
}
