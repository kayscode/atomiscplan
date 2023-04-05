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
        Schema::create('job_position', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("position_code");
            $table->integer("year_of_experience");
            $table->text("hard_skills")->nullable(false)->index("hard_skills");
            $table->text("soft_skills")->nullable(false)->index("soft_skills");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_position');
    }
};
