<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee201Form extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = ('employee201');

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employeeaccount_id',
        'employeename',
        'employeeaddress',
        'employeeposition',
        'employeecontact',
        'employeeemail',
        'employeeage',
        'gender',
        'employeebirthdate',
        'employeebirthplace',
        'employeereligion',
        'employeecivilstatus',
        'employeelicense',
        'dateofexpiration',
        'employeefathername',
        'employeemothername',
        'employeespousename',
        'employeerelativename',
        'employeerelativenumber',
        'employeesss',
        'employeephilhealth',
        'employeetin',
        'employeepagibig',
        'uploadpic',
        'change_signature',
        'hsnameofschool',
        'hscoursedegree',
        'hsyearcompleted',
        'collegenameofschool',
        'collegecoursedegree',
        'collegeyearcompleted',
        'vocationalnameofschool',
        'vocationalcoursedegree',
        'vocationalyearcompleted',
        'companyname1',
        'position1',
        'companyaddress1',
        'yearsoftenure1',
        'companyname2',
        'position2',
        'companyaddress2',
        'yearsoftenure2',
        'companyname3',
        'position3',
        'companyaddress3',
        'yearsoftenure3',
        'companyname4',
        'position4',
        'companyaddress4',
        'yearsoftenure4',
        'employeeotherdata'
    ];

  //Connecting EmployeeAccounts Model here to Employee201form Model
  public function employeeAccount(): BelongsTo
  {
      return $this->belongsTo(EmployeeAccounts::class, 'employeeaccount_id');
  }
  
}
