<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Careers extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = "careers";

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'positiontitle',
        'location',
        'jobdescription',
        'qualifications1',
        'qualifications2',
        'qualifications3',
        'qualifications4',
        'qualifications5',
        'qualifications6',
        'qualifications7',
        'qualifications8',
    ];


}
