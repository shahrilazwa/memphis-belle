<?php
namespace App\Http\Traits;

use Webpatser\Uuid\Uuid;

trait UuidTrait
{
    protected static function boot()
    {
        parent::boot();
        
        static::creating(
            function ($model) {
                // $model->{$model->getKeyName()} = Uuid::generate()->string;
                $model->uuid = 'ABC';
                return $model;
            }
        );
    }
}
