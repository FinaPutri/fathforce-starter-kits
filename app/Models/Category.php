<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function posts() {
        return $this->hasMany('App\Models\Post', 'id_cat');
    }
}
