<?php

namespace App\Models;

use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'text', 'description', 'date', 'type', 'category_id', 'posted'];

    function category()
    {
        return $this->belongsTo(Category::class);
    }

    function tags()
    {
        return $this->morphedByMany(Tag::class, 'taggables');
    }

    function getImageURL()
    {
        return URL::asset("images/post/" . $this->image);
    }
}
