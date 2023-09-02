<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reviewer_id',
        'reviewed_id',
        'rating',
        'comment',
        'dateReview',
        'item_id'
        // Add other fillable fields here
    ];

    // Add relationships, methods, and other definitions as needed
    /**
     * Define the relationship between Category and Product models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */


    //relationship that says this review belongs to this users
    public function sender() // reviewer
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
    
    public function receiver() // reviewed
    {
        return $this->belongsTo(User::class, 'reviewed_id');
    }
    //relationship that says this review belongs to that item
    public function item()
    {
         return $this->belongsTo(Item::class);
    }
   
}
