<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    use HasFactory;

    protected $table = 'parent-categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parentcategoryName',
    ];

    // Add relationships, methods, and other definitions as needed
    /**
     * Define the relationship between Category and Product models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    //one type can have many categories
    public function categories()
    {
        return $this->hasMany(Category::class, 'parentCategory_id');
    }
}
