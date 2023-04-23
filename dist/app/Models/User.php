<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Category;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'number',
        'role',
        'manager_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relationship with idea table.
     *
    */
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }
    /**
     * Relationship with categories table.
     *
    */
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }
    /**
     * Relationship with idea table for portfolio.
     *
    */
    public function portfolio()
    {
        return $this->belongsToMany(Idea::class, 'user_portfolio', 'user_id', 'idea_id')->withTimestamps();
    }
    /**
     * Relationship with idea table for wishlist.
     *
    */
    public function wishlist()
    {
        return $this->belongsToMany(Idea::class, 'user_wishlist', 'user_id', 'idea_id')->withTimestamps();
    }
    /**
     * Relationship with self to assign a relationship manager.
     *
    */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
    /**
     * Relationship with self to view relationship manager's clients.
     *
    */
    public function clients()
    {
        return $this->hasMany(User::class, 'manager_id');
    }
}
