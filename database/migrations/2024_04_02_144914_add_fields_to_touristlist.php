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
        Schema::table('touristlist', function (Blueprint $table) {
            $table->string('tlphoto', 200)->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('touristlist', function (Blueprint $table) {
            $table->string('tlphoto', 200)->nullable(false)->change();
        });
    }
};
