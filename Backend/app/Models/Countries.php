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
    
    use HasFactory;
}
