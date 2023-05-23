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
        Schema::table('formation',function (Blueprint $table){
            $table->boolean("is_finished")->default(false);
            $table->boolean("is_validated")->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("formation",function (Blueprint $table){
            $table->dropColumn("is_finished");
            $table->dropColumn("is_validated");
        });
    }
};
