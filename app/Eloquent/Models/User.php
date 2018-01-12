<?php

namespace LinkLater\Eloquent\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LinkLater\Events\UserAmended;
use Matthewbdaly\LaravelAdmin\Contracts\Adminable;

class User extends Authenticatable implements Adminable
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
}
