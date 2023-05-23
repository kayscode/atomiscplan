<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("password");
            $table->string("employee_mat");
            $table->enum("user_type",["employee","training_planner","hr_director"])->default("employee");
            $table->boolean("is_activated")->default(false);
            $table->foreign("employee_mat")->references("employee_mat")->on("employee");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
