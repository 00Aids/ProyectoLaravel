<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'cedula',
        'email',
        'address',
        'cellphone',
        'id_country',
        'id_country'
    ];
}
