<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Exchange extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Nanoids;

    protected $fillable = [
        'group_id',
        'name',
        'description',
        'currency',
        'exchange_type',
        'image_url',
        'is_active',
    ];

    public function get_exchange_group()
    {
        return $this->hasOne(ExchangeGroup::class, 'id', 'group_id');
    }
}
