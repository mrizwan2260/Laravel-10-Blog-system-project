<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'user_id',
        'gallery_id',
        'category_id',
        'title',
        'slug',
        'description',
        'status'
    ];

    //Post sulg function
    public function sluggable(): array
    {
        return [
            'slug' => ['source' => 'title']
        ];
    }

    public function getRouteKey()
    {
        return 'slug';
    }

    //Relation of tags and post
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //Relation of category and post
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //Relation of user and post
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relation of image and post
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    //Relation of comment and post
    public function comment()
    {
        return $this->hasMany(Comment::class);
    }
}
