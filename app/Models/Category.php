<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $table = 'categories'; 

    protected $fillable = [
        'categoryName',
        'parentCategory_id',
        // Add other fillable fields here
    ];

    // Add relationships, methods, and other definitions as needed
    /**
     * Define the relationship between Category and Product models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

     //relationship with the items table (one category can have more than 1 item)
    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
    

    //relationship with the parents category table (the category belongs to the parent, if the parent category is deleted, all the categories from that parent are deleted as well)
    public function ownedBy(ParentCategory $parentCategory)
    {
        return $this->parentCategory_id === $parentCategory->id;
    }
}
