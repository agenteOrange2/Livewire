<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'text'];

    function posts(){
        return $this->hasMany(Post::class);
    }

    function getImageUrl(){
        return URL::asset('images/category/' . $this->image);
    }
}
