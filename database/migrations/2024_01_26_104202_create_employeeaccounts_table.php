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
        Schema::create('employeeaccounts', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('fullname');
            $table->string('clientdesignation');
            $table->string('status')->default('Set Status');
            $table->string('username');
            $table->string('password');
            $table->string('confirmpassword');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employeeaccounts');
    }
};
