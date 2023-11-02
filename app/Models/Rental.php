<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $table='car_user';
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'start_rent',
        'end_rent'
    ];
}
