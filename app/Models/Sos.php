<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sos extends Model
{
    protected $fillable =
    [
        'name',
        'image',
        'price',
        'counts',
        'status',
        'size',
    ];
}
