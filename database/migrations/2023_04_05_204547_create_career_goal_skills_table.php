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
        Schema::create('career_goal_skills', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean("state");
            $table->enum("skill_type",array('hard_skill','soft_skill'));
            $table->enum("skill_access_by",array('training','bootcamp','conference','certification','work experience'));
            $table->integer("career_goal_id")->unsigned();
            $table->foreign("career_goal_id")
                ->references("id")->on("employee_career_goals_plan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('career_goal_skills');
    }
};
