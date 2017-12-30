<?php

namespace LinkLater\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $casts = [
        'id' => 'string',
    ];

    protected $primaryKey = "id";

    public function user()
    {
        return $this->belongsTo('LinkLater\Eloquent\Models\User');
    }
}
