<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['name', 'slug'];

    //Tag slug function
    public function sluggable(): array
    {
        return [
            'slug' => ['source' => 'name']
        ];
    }

    public function getRouteKey()
    {
        return 'slug';
    }
}
