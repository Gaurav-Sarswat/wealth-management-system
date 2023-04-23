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

    /**
     * To create slug for idea with the idea title.
     *
    */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($idea) {
            $idea->slug = Str::slug($idea->title);
        });
    }
    /**
     * Relationship with user table.
     *
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Relationship with categories table.
     *
    */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_idea', 'idea_id', 'category_id');
    }
    /**
     * Relationship with currencies table.
     *
    */
    public function currencies()
    {
        return $this->belongsToMany(Currency::class);
    }
    /**
     * Relationship with major_sectors table.
     *
    */
    public function majorsectors()
    {
        return $this->belongsToMany(MajorSector::class, 'major_sector_idea');
    }
    /**
     * Relationship with minor_sectors table.
     *
    */
    public function minorsectors()
    {
        return $this->belongsToMany(MinorSector::class, 'minor_sector_idea');
    }
    /**
     * Relationship with regions table.
     *
    */
    public function regions()
    {
        return $this->belongsToMany(Region::class, 'region_idea');
    }
    /**
     * Relationship with countries table.
     *
    */
    public function countries()
    {
        return $this->belongsToMany(Countries::class, 'country_idea', 'idea_id', 'countries_id');
    }
    /**
     * Relationship with user table to manage user portfolio.
     *
    */
    public function userportfolio()
    {
        return $this->belongsToMany(User::class, 'user_portfolio', 'idea_id', 'user_id')->withTimestamps();
    }
    /**
     * Relationship with user table to manage wishlist.
     *
    */
    public function userwishlist()
    {
        return $this->belongsToMany(User::class, 'user_wishlist', 'idea_id', 'user_id')->withTimestamps();
    }

}
