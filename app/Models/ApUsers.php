<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ApUsers extends Authenticatable
{

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
    protected $fillable = ['id', 'name','surname','email', 'password', 'residential_address','person_id', 'phone'];
    /**
     * $hidden is table 'ap_users' fields is hidden
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsToMany(ApRoles::class, 'ap_user_roles_connections', 'user_id', 'role_id' );
    }
}
