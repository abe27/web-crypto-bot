<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Interesting extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Nanoids;

    protected $fillable = [
        'asset_id',
        'exchange_id',
        'currency_id',
        'trend',
        'last_price',
        'last_percent',
        'open_order',
        'is_active',
    ];

    public function get_asset()
    {
        return $this->hasOne(Asset::class, 'id', 'asset_id');
    }

    public function get_exchange()
    {
        return $this->hasOne(Exchange::class, 'id', 'exchange_id');
    }

    public function get_currency()
    {
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }
}
