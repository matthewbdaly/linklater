<?php

namespace LinkLater\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Guard;

class Link extends Model
{
    protected $casts = [
        'id' => 'string',
    ];

    protected $fillable = [
        'title',
        'link',
        'user_id',
    ];

    protected $hidden = [
        'user_id',
        'created_at',
        'updated_at',
        'public'
    ];

    protected $primaryKey = "id";

    public function user()
    {
        return $this->belongsTo('LinkLater\Eloquent\Models\User');
    }

    public function scopeForUser($query, Guard $auth)
    {
        return $query->where('user_id', $auth->user()->id);
    }
}
