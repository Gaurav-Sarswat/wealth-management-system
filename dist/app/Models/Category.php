<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
   
    protected $fillable = ['title', 'idea'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->title);
        });
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function idea()
    {
        return $this->belongsToMany(Idea::class, 'category_idea', 'idea_id', 'category_id');
    }

}
