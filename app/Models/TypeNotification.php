<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeNotification extends Model
{
    use HasFactory;

    //the table name is different from the laravel form default
    protected $table = 'type-notifications';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'typeNotificationName',
    ];

    // Add relationships, methods, and other definitions as needed
    /**
     * Define the relationship between Category and Product models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    //type notification can have many notifications
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
