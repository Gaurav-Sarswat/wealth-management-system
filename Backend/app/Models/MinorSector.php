<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinorSector extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'major_sectors_id',
    ];

    public function majorsector()
    {
        return $this->belongsTo(MajorSector::class, "major_sectors_id");
    }

    public function ideas()
    {
        return $this->belongsToMany(Idea::class, "minor_sector_idea");
    }
}
