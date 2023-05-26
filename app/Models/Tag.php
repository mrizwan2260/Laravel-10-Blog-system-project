<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['name','slug'];

    public function sluggable(): array
    {
        return[
            'slug' => ['source' => 'name']
        ];
    }

    public function getRouteKey()
    {
        return 'slug';
    }
}
