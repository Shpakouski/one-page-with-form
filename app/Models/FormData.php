<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'birthdate',
        'email',
        'phone',
        'marital_status',
        'about',
    ];

    protected $casts = [
        'phone' => 'array',
    ];
}
