<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ApiExchange extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Nanoids;

    protected $fillable = [
        'user_id',
        'exchange_id',
        'api_key',
        'api_secret',
        'expire_date',
        'is_active',
    ];

    public function get_exchange() {
        return $this->hasOne(Exchange::class, 'id', 'exchange_id');
    }
}
