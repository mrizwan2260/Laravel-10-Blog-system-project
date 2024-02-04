<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['name', 'slug'];

    //Slug function
    public function sluggable(): array
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
