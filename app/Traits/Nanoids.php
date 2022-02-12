<?php

namespace App\Traits;

use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;

trait Nanoids
{
    /**
     * Boot function from Laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $client = new Client();
            $keys = $client->formattedId(
                $alphabet =
                    '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
                $size = 21
            );
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = $keys;
            }
        });
    }
    /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }
    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
