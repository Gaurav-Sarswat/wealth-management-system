<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{

    protected $fillable = [
        "name",
        "region_id"
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function ideas()
    {
        return $this->belongsToMany(Idea::class, 'country_id', 'countries_id', 'idea_id');
    }
    
    use HasFactory;
}
