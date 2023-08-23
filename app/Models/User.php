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

    public function items(){
        return $this->hasMany(Item::class, 'user_id');
        //hasMany() will allow a User to use multiple listings
    }

    public function reviews(){
        return $this->hasMany(Review::class, 'reviewer_id', Review::class, 'reviewed_id');
    }

    public function messages(){
        return $this->hasMany(Message::class, 'sender_id', Message::class, 'receiver_id');
    }

    public function notifications(){
        return $this->hasMany(Notification::class, 'user_id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'seller_id', Transaction::class, 'buyer_id');
    }
}
