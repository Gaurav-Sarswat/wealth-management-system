<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    protected $fillable = [
        "name"
    ];

    public function countries()
    {
        return $this->hasMany(Country::class);
    }

    public function ideas()
    {
        return $this->belongsToMany(Idea::class, 'region_id');
    }

    use HasFactory;
}
