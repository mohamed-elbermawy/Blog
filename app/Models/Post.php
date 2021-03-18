<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
//        'slug',
        'description',
        'user_id',
    ];

    //we had to put foreignKey cause function name isn't the same as foreign key column
    // public function myUserRelation()
    // {
    //     return $this->belongsTo(User::class,'user_id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
