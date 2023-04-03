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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string("first_name",length: 20);
            $table->string("last_name", length: 20);
            $table->string("middle_name", length: 20);
            $table->string("profile_picture")->nullable(true);
            $table->text("soft_skills");
            $table->text("hard_skills");
            $table->text("ambitions");
            $table->softDeletes();
            $table->string("employee_mat")->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
