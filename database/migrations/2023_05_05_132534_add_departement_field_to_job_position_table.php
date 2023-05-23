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
        Schema::table('job_position', function (Blueprint $table) {
            $table->enum("department",["IT","Finance","RH","Accounting","marketing","production"])->default("RH");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_position', function (Blueprint $table) {
            $table->dropColumn("department");
        });
    }
};
