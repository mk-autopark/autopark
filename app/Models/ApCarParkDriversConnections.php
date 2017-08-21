<?php

namespace App\Models;



class ApCarParkDriversConnections extends CoreModel
{
    /**
     * Database table name
     * @var string
     */
    protected $table = 'ap_carpark_driver_connections';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'count','driver_id', 'carpark_id'];

}
