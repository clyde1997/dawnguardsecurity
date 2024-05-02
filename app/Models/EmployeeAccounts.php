<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EmployeeAccounts extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'employeeaccounts';//Had to declare this to ensure laravel discovers this table name


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'clientdesignation',
        'status',
        'username',
        'password',
        'confirmpassword',
    ];

        
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'confirmpassword',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'confirmpassword' => 'hashed',
    ];

    
    //Connecting/Merging EmployeeAvatar Model here to Employee Accounts Model
    public function avatar(): HasOne
    {

    return $this->hasOne(EmployeeAvatar::class, 'employeeaccount_id');
    
    }
    
    //Connetctin Employee201 Form model here to Employee Accounts Model
    public function employee201Forms(): HasOne
    {

    return $this->HasOne(Employee201Form::class, 'employeeaccount_id');
    
    }


    //Connetctin EmployeePayslip  model here to Employee Accounts Model, used "HasMany" since employee can have many payslips
    public function employeePayslip(): HasMany
    {

    return $this->hasMany(EmployeePayslip::class, 'employeeaccount_id');

    }

    
     //Connetctin EmployeeDocuments  model here to Employee Accounts Model, used "HasMany" since employee can have many documents
     public function employeeDocuments(): HasMany
     {
 
     return $this->hasMany(EmployeeDocuments::class, 'employeeaccount_id');
 
     }

}
