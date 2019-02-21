<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'title', 'picture'
    ];

    public function getUser()
    {
        return $this->belongsTo('App\User', 'edited_by', 'id');
    }
}
