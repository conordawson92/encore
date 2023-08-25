<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items'; 

    protected $fillable = [
        'ItemName',
        'description',
        'size',
        'price',
        'brand',
        'condition',
        'dateListed',
        'tags',
        'quantity',
        'status',
        'category_id',
        'sellerUser_id',
        'buyerUser_id'
    ];

    public function scopeFilter($query, array $filters){
        //array $filters: all the filters to add in the query

        //$filters['tag'] represents the value we got from the ListingsController
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where(function ($query) use ($filters) {
                $query->where('ItemName', 'LIKE', '%' . $filters['search'] . '%')
                    ->orWhere('description', 'LIKE', '%' . $filters['search'] . '%')
                    ->orWhere('price', 'LIKE', '%' . $filters['search'] . '%')
                    ->orWhere('size', 'LIKE', '%' . $filters['search'] . '%')
                    ->orWhere('brand', 'LIKE', '%' . $filters['search'] . '%');
            });
        }
    }

    //relationship that says this item belongs to that user(was created by)
    public function user(){
        return $this->belongsTo(User::class, 'sellerUser_id');
    }

    // Define the relationship to the Category model using 'category_id'
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    //relationship to user, the item to sell belongs to a user, if the user is deleted, all his items will be too
    public function ownedBy(User $user)
    {
        return $this->user_id === $user->id;
    }

    //an item can have many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class, 'item_id');
    }

    //relationship with the user (dashboard)
    public function seller()
    {
        return $this->belongsTo(User::class, 'sellerUser_id');
    }    
}