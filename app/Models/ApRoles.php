<?php
/**
 * Created by PhpStorm.
 * User: mindz
 * Date: 8/22/2017
 * Time: 9:55 AM
 */

namespace App\Models;


class ApRoles extends CoreModel
{
    /**
     * $table name DataBases
     */
    protected $table = 'ap_roles';
    /**
     * $fillable is table 'ap_roles' fields
     */
    protected $fillable = ['id', 'name'];

}