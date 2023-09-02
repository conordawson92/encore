<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'content',
        'dateSent',
        'content',
        'status',
        'typeNotification_id',
        // Add other fillable fields here
    ];

    // Add relationships, methods, and other definitions as needed
    /**
     * Define the relationship between Category and Product models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    //relationship that says this notification belongs to that type 
    public function ownedBy(TypeNotification $typeNotification)
    {
        return $this->typeNotification_id === $typeNotification->id;
    }

    //relationship that says this notification belongs to that user
    public function sender()
    {
        return $this->belongsTo(User::class);
    }

    //relationship that says this notification belongs to that item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    //relationship that says this notification belongs to that type and the connection between them
    public function typeNotification()
    {
        return $this->belongsTo(TypeNotification::class, 'typeNotification_id');
    }

}
