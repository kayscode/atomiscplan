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
        Schema::create('employee_career_goals_plan', function (Blueprint $table) {
            $table->id();
            $table->integer("employee_id")->unsigned();
            $table->foreign("employee_id")
                ->references("id")->on("employee");
            $table->string("goal_title");
            $table->integer("year");
            $table->longText("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_career_goals_plan');
    }
};
