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
        Schema::create('careers', function (Blueprint $table) {
            $table->id();
            $table->string('positiontitle');
            $table->string('location');
            $table->longText('jobdescription');
            $table->string('qualifications1');
            $table->string('qualifications2');
            $table->string('qualifications3');
            $table->string('qualifications4');
            $table->string('qualifications5');
            $table->string('qualifications6');
            $table->string('qualifications7');
            $table->string('qualifications8');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('careers');
    }
};
