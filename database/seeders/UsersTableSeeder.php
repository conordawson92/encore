<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'userName' => 'BannedAdmin',
                'userImage' => 'BannedAdmin.jpg',
                'dateJoined' => '2023-08-20',
                'userLocation' => 'Banned',
                'userRating' => 5,
                'userPhone' => '+1234567890',
                'paymentInfo' => 'VISA xxxx-xxxx-xxxx-1234',
                'email' => 'banned@admin.com',
                'banUser' => 0,
                'email_verified_at' => NULL,
                'password' => Hash::make('hashed_password_example'),
                'remember_token' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL
            ],
            [
                'id' => 2,
                'userName' => 'ExampleUser',
                'userImage' => '/path/to/image.jpg',
                'dateJoined' => '2023-08-22',
                'userLocation' => 'ExampleCity, ExampleCountry',
                'userRating' => 5,
                'userPhone' => '123-456-7890',
                'paymentInfo' => 'CreditCard: xxxx-xxxx-xxxx-1234',
                'email' => 'example@example.com',
                'banUser' => 0,
                'email_verified_at' => '2023-08-22 10:34:56',
                'password' => Hash::make('hashed_password'),
                'remember_token' => 'token_value',
                'created_at' => '2023-08-22 10:34:56',
                'updated_at' => '2023-08-22 10:34:56',
                'deleted_at' => NULL
            ],
            [
                'id' => 3,
                'userName' => 'Conor',
                'userImage' => NULL,
                'dateJoined' => '2023-08-24 12:48:53',
                'userLocation' => 'luxembourg',
                'userRating' => 3,
                'userPhone' => '661852551',
                'paymentInfo' => 'Card',
                'email' => 'conordawson92@googlemail.com',
                'banUser' => 0,
                'email_verified_at' => NULL,
                'password' => '$2y$10$XzaOnVfiDxhGLZesX5m6L.iMNTOB0XNUuJKL5Hjf17s84VZYQ4RGy',
                'remember_token' => NULL,
                'created_at' => '2023-08-24 10:48:53',
                'updated_at' => '2023-08-24 10:48:53',
                'deleted_at' => NULL
            ],
            [
                'id' => 4,
                'userName' => 'johnDoe',
                'userImage' => 'images/johnDoe.jpg',
                'dateJoined' => '2023-08-20',
                'userLocation' => 'New York',
                'userRating' => 5,
                'userPhone' => '+1234567890',
                'paymentInfo' => 'VISA xxxx-xxxx-xxxx-1234',
                'email' => 'johny@example.com',
                'banUser' => 1,
                'email_verified_at' => NULL,
                'password' => Hash::make('hashed_password_example'),
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2023-08-25 12:30:57',
                'deleted_at' => NULL
            ]
        ]);
    }
}
