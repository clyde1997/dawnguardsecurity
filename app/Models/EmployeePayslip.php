<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeePayslip extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'employeepayslip';//Had to declare this to ensure laravel discovers this table name


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'employeeaccount_id',
        'payslip',
    ];


    //Connecting EmployeeAccounts Model here to EmployeeAvatar Model
    public function employeeAccount(): BelongsTo
    {
        return $this->belongsTo(EmployeeAccounts::class, 'employeeaccount_id');
    }
    
}
