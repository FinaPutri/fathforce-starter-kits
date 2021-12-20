<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    use HasFactory, Commentable;

    protected $guarded = [
        'id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'id_cat');
    }
}