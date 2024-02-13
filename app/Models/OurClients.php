<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurClients extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'ourclients';//Had to declare this to ensure laravel discovers this table name

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'clientlogo',
        'clientname',
    ];
}
