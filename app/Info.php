<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'title', 'content',
    ];

    public function getUser()
    {
        return $this->belongsTo('App\User', 'edited_by', 'id');
    }
}
