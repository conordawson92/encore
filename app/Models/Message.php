<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'senderUser_id',
        'receiverUser_id',
        'item_id',
        'dateSent',
        'content',
        'status'
        // Add other fillable fields here
    ];

    // Add relationships, methods, and other definitions as needed
    /**
     * Define the relationship between Category and Product models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    //relationship that says this message belongs to that user(was created by)
    public function user()
    {
        return $this->belongsTo(User::class, 'senderUser_id');
    }
 
    public function sender()
    {
        return $this->belongsTo(User::class, 'senderUser_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiverUser_id');
    }
 
    //relationship that says this message belongs to that item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

}
