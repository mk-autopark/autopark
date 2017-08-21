<?php

namespace App\Models;



class ApHistoryRoutes extends CoreModel
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
    protected $fillable = ['id', 'count', 'entry_date','distance','connection_id'];

}
