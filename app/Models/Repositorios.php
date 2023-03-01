<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repositorios extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'node_id', 'url', 'organizacao', 'linguagem', 'commits'
    ];

    protected $guarded = [];

    protected $casts = [
        '' => 'array'
    ];

}

