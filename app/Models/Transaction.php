<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'buyerUser_id',
        'sellerUser_id',
        'item_id',
        'datePurchase',
        'paymentDetails',
        'shippingDetails',
        // Add other fillable fields here
    ];

    // Add relationships, methods, and other definitions as needed
    /**
     * Define the relationship between Category and Product models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     public function transactions(){
        return $this->hasMany(Transaction::class, 'user_id');
        //hasMany() will allow a User to use multiple listings
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'sellerUser_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyerUser_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    
}
