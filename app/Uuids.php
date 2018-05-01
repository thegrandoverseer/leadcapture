<?php
namespace App;

use Webpatser\Uuid\Uuid;

trait Uuids
{

    /**
     * Models which use a uuid as the primary key are not incrementing.
     * @var Boolean
     */
    public $incrementing = false;

    /**
     * When creating a new model, set a unique uuid as primary key before saving
     */
    protected static function bootUuids()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate()->string;
        });
    }
}