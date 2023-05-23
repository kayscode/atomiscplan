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
        Schema::create('formation_participants', function (Blueprint $table) {
            $table->id();
            $table->date("applied");
            $table->boolean("participate")->default(false);
            $table->integer("employee_id");
            $table->foreign('employee_id')->references("id")->on("employee");
            $table->integer("formation_id");
            $table->foreign("formation_id")->references("id")->on("formation");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formation_participants');
    }
};
