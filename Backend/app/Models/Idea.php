<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Idea extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use SoftDeletes;
    protected $fillable = [
        "title",
        "abstract",
        "content",
        "risk_rating",
        "expiry_date",
        "categories",
        "instruments",
        "currency",
        "major_sector",
        "minor_sector",
        "region",
        "country",
        "image",
        "user_id",
        "published_date",
        "status"
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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($idea) {
            $idea->slug = Str::slug($idea->title);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_idea', 'idea_id', 'category_id');
    }

    public function currencies()
    {
        return $this->belongsToMany(Currency::class);
    }

    public function majorsectors()
    {
        return $this->belongsToMany(MajorSector::class, 'major_sector_idea');
    }

    public function minorsectors()
    {
        return $this->belongsToMany(MinorSector::class, 'minor_sector_idea');
    }

    public function regions()
    {
        return $this->belongsToMany(Region::class, 'region_idea');
    }

    public function countries()
    {
        return $this->belongsToMany(Countries::class, 'country_idea', 'idea_id', 'countries_id');
    }

}
