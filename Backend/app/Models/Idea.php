<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "title",
        "abstract",
        "content",
        "risk_rating",
        "expiry_date",
        "category",
        "instruments",
        "currency",
        "major_sector",
        "minor_sector",
        "region",
        "country",
        "image",
        "user_id",
        "published_date"
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
