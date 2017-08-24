<?php

namespace App\Models;




class ApCarPark extends CoreModel
{
    /**
     * Database table name
     * @var string
     */
    protected $table = 'ap_carpark';
    /**
     * Fillable column names
     * @var array
     */
    protected $fillable = ['id', 'count', 'manufacturer','model','average_fuel_consumption','license_plate'];

    public function scopeSearch($query, $search) {
        return $query->where('manufacturer', 'like', '%' .$search. '%')
            ->orWhere('model', 'like', '%' .$search. '%')
            ->orWhere('average_fuel_consumption', 'like', '%' .$search. '%')
            ->orWhere('license_plate', 'like', '%' .$search. '%');

    }
}
