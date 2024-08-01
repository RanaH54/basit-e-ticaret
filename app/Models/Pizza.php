<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $fillable =
    [
        'name',
        'image',
        'short_text',
        'price',
        'size',
        'status',
    ];

    public function getPriceBySize($size)
   {
    switch ($size) {
        case 'small':
            return $this->price_small;
        case 'medium':
            return $this->price_medium;
        case 'large':
            return $this->price_large;
        default:
            return $this->price;
    }
   }
}
