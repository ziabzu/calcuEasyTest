<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    // Use softdeletes to keep old record 
    use HasFactory, SoftDeletes;

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public $fillable = [
        'name',
        'price',
    ];

}
