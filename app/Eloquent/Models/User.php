<?php

namespace LinkLater\Eloquent\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LinkLater\Events\UserAmended;
use Matthewbdaly\LaravelAdmin\Contracts\Adminable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements Adminable, JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'id' => 'string',
    ];

    protected $primaryKey = "id";

    protected $dispatchesEvents = [
        'saved' => UserAmended::class,
        'deleted' => UserAmended::class,
        'restored' => UserAmended::class,
    ];

    public function isAdmin()
    {
        return $this->admin == true;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
