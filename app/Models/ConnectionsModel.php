<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use Ramsey\Uuid\Uuid;

class ConnectionsModel extends Model
{


    /**
     * Disables auto-increment
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Generates UUID if doesn't exist in entry
     *
     * returns @string
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model)
        {
            if (!isset($model->attributes['id'])) {
                $model->attributes['id'] = Uuid::uuid4();
            } else {
                $model->{$model->getKeyName()} = $model->attributes['id'];
            }
        });
    }

    public static function getTableName()
    {
        return with(new static)->getTable();
    }

}