<?php

namespace App\Models;

use App\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ApUsers extends Authenticatable
{
    use UuidTrait;
    use Notifiable;
    use SoftDeletes;
    public $incrementing = false;
    /**
     * $table name DataBases
     */
    protected $table = 'ap_users';
    /**
     * $fillable is table 'ap_users' fields
     */
    protected $fillable = ['id', 'name', 'surname', 'email', 'password', 'residential_address', 'person_id', 'phone'];
    /**
     * $hidden is table 'ap_users' fields is hidden
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsToMany(ApRoles::class, 'ap_user_roles_connections', 'user_id', 'role_id');
    }
    public function drivers()
    {
        return $this->belongsToMany(ApCarPark::class, 'ap_carpark_driver_connections', 'driver_id', 'carpark_id');
    }

    public function scopeSearch($query, $search) {
        return $query->where('name', 'like', '%' .$search. '%')
            ->orWhere('surname', 'like', '%' .$search. '%')
            ->orWhere('email', 'like', '%' .$search. '%')
            ->orWhere('residential_address', 'like', '%' .$search. '%')
            ->orWhere('phone', 'like', '%' .$search. '%');

    }

}
