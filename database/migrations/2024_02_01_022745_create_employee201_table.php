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
        Schema::create('employee201', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employeeaccount_id')->constrained('employeeaccounts');
            $table->string('employeename');
            $table->string('employeeaddress');
            $table->string('employeeposition');
            $table->bigInteger('employeecontact');
            $table->string('employeeemail');
            $table->integer('employeeage');
            $table->string('gender');
            $table->date('employeebirthdate');
            $table->string('employeebirthplace');
            $table->string('employeereligion');
            $table->string('employeecivilstatus');
            $table->string('employeelicense');
            $table->date('dateofexpiration');
            $table->string('employeefathername');
            $table->string('employeemothername');
            $table->string('employeespousename');
            $table->string('employeerelativename');
            $table->bigInteger('employeerelativenumber');
            $table->bigInteger('employeesss');
            $table->bigInteger('employeephilhealth');
            $table->bigInteger('employeetin');
            $table->bigInteger('employeepagibig');
            $table->string('uploadpic')->nullable();
            $table->string('change_signature')->nullable();
            $table->string('hsnameofschool');
            $table->string('hscoursedegree');
            $table->string('hsyearcompleted');
            $table->string('collegenameofschool');
            $table->string('collegecoursedegree');
            $table->string('collegeyearcompleted');
            $table->string('vocationalnameofschool');
            $table->string('vocationalcoursedegree');
            $table->string('vocationalyearcompleted');
            $table->string('companyname1');
            $table->string('position1');
            $table->string('companyaddress1');
            $table->string('yearsoftenure1');
            $table->string('companyname2');
            $table->string('position2');
            $table->string('companyaddress2');
            $table->string('yearsoftenure2');
            $table->string('companyname3');
            $table->string('position3');
            $table->string('companyaddress3');
            $table->string('yearsoftenure3');
            $table->string('companyname4');
            $table->string('position4');
            $table->string('companyaddress4');
            $table->string('yearsoftenure4');
            $table->longText('employeeotherdata');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee201');
    }
};
