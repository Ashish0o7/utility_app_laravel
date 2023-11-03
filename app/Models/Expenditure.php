<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        // Add 'description' here
        'amount',
        'category',
        'date',
        // Add other fields that are fillable
    ];
}

