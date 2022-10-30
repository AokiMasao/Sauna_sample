<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'name',

    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    public function posts() {
        return $this->hasMany('App\Models\Post');
    }


}
