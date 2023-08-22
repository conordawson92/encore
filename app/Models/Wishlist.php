<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'item_id',
        // Add other fillable fields here
    ];

    // Add relationships, methods, and other definitions as needed
    /**
     * Define the relationship between Category and Product models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    //relationship to user model
    public function user(){
        //now for laravel, our Products belong to a User    
        return $this->belongsTo(User::class, 'user_id');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'wishlist_id');
    }
}
