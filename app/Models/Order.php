<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pizza_id',
        'icecek_id',
        'atistirmalik_id',
        'sos_id',
        'tatli_id',
        'name',
        'quantity',
        'total_amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pizza()
    {
        return $this->belongsTo(Pizza::class, 'pizza_id');
    }

    public function icecek()
    {
        return $this->belongsTo(Icecek::class, 'icecek_id');
    }

    public function atistirmalik()
    {
        return $this->belongsTo(Atistirmalik::class, 'atistirmalik_id');
    }

    public function sos()
    {
        return $this->belongsTo(Sos::class, 'sos_id');
    }

    public function tatli()
    {
        return $this->belongsTo(Tatli::class, 'tatli_id');
    }

    public function name()
    {
        return $this->belongsTo(Urun::class, 'name');
    }
}

