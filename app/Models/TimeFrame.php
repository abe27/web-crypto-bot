<?php

namespace App\Models;

use App\Traits\Nanoids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class TimeFrame extends Model
{
    use HasApiTokens, HasFactory, Notifiable, Nanoids;

    protected $fillable = [
        'seq',
        'name',
        'value',
        'is_active',
    ];
}
