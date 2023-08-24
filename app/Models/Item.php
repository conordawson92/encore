<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'itemName',
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

        //$filters['tag'] represents the value we got from the ProductController
        if($filters['tag'] ?? false )
        {
            //let s prepare our SQL query
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
            // where() will build the sql query for us
            //'tags' is the name of the column to use
            //'like' is the operation to use
            //'%' .$filters['tag'] . '%' is the criteria for the "like" operation
        }

        if($filters['search'] ?? false) {

            //make an array of keywords to search for
            $keywords = explode(' ', $filters['search']);
            
            foreach($keywords as $keyword){

            $query-> where('itemName', 'like', '%' . $keyword . '%')->orWhere 
            ('description', 'like', '%' . $keyword . '%')->orWhere 
            ('size', 'like', '%' . $keyword . '%')->orWhere 
            ('price', 'like', '%' . $keyword . '%')->orWhere 
            ('brand', 'like', '%' . $keyword . '%');
            }
        }
    }

    //relationship to user model
    public function user(){
        //now for laravel, our Products belong to a User    
        return $this->belongsTo(User::class, 'sellerUser_id');
    }

    // Define the relationship to the Category model using 'category_id'
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function ownedBy(User $user)
    {
        return $this->user_id === $user->id;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'item_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'sellerUser_id');
    }

    
    
}
