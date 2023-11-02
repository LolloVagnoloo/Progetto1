<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Car extends Model
{
    protected $table='cars';
    use HasFactory;


    protected $fillable = [
        'brand',
        'model',
        'seats',
        'price',
        'displacement',
        'plate',
        'description',
        'image'
    ];

    public function users()
    {
            return $this -> belongsToMany(User::class);
    }
}
