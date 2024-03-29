<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajorSector extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function minorsectors()
    {
        return $this->hasMany(MinorSector::class);
    }

    public function ideas()
    {
        return $this->belongsToMany(Idea::class, 'major_sector_idea');
    }
}
