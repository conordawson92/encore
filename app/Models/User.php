<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'userName',
        'dateJoined',
        'userRating',
        'userLocation',        
        'userPhone',
        'paymentInfo',
        'email',
        'banUser',
        'password',
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
        'password' => 'hashed',
    ];

    //a user can have many items
    public function items(){
        return $this->hasMany(Item::class, 'user_id');
        //hasMany() will allow a User to use multiple listings
    }

    //a user can have many reviews
    public function reviews(){
        return $this->hasMany(Review::class, 'reviewer_id', Review::class, 'reviewed_id');
    }

    //a user can have many messages
    public function messages(){
        return $this->hasMany(Message::class, 'sender_id', Message::class, 'receiver_id');
    }

    //a user can have many notifications
    public function notifications(){
        return $this->hasMany(Notification::class, 'user_id');
    }

    //a user can have many notifications
    public function transactions(){
        return $this->hasMany(Transaction::class, 'seller_id', Transaction::class, 'buyer_id');
    }

    //to update the users rating after reviews
    public function updateRating($newRating) {

        // Calculate the new rating based on received rating
        $currentRating = $this->userRating;
        $totalRatings = $this->reviewsReceived->count();
    
        // Calculate the new rating (you can adjust the formula as needed)
        $newRatingValue = ($currentRating * $totalRatings + $newRating) / ($totalRatings + 1);
    
        // Update the user's rating
        $this->userRating = $newRatingValue;
        $this->save();
    }

    //a user can have many buying transactions 
    public function buyingTransactions() {
        return $this->hasMany(Transaction::class, 'buyerUser_id')->with('item');
    }

    public function sellerItems()
    {
        return $this->hasMany(Item::class, 'sellerUser_id');
    }

    //a user can have many wishlist
    public function wishlist()
    {
        return $this->belongsToMany(Item::class, 'wishlists', 'user_id', 'item_id');
    }


}
