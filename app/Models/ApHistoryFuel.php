<?php

namespace App\Models;



class ApHistoryFuel extends CoreModel
{
    /**
     * Database table name
     * @var string
     */
    protected $table = 'ap_history_fuel';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'count', 'entry_date','fuel_consumed','car_id','user_id','driver_car_id'];

}
