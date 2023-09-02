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
                'userName' => 'Conor',
                'userImage' => 'images/assets/users/Conor Dawson/09ltyoPI1IvHWsg10G00W48FueiBMk2wVh5ASQnr.png',
                'dateJoined' => '2023-08-24 12:48:53',
                'userLocation' => 'luxembourg',
                'userRating' => 3,
                'banUser' => 0,
                'userPhone' => '661852551',
                'paymentInfo' => 'Card',
                'email' => 'conordawson92@googlemail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$8D5WME8sDepFV.3CzWgeJOsqeobHRlPpuK0yG1uGy4wh7CNoudczm',
                'remember_token' => NULL,
                'role' => 'admin', // This user is an admin
                'created_at' => '2023-08-24 10:48:53',
                'updated_at' => '2023-08-24 10:48:53',
                'deleted_at' => NULL
            ],
            [
                'id' => 2,
                'userName' => 'Telma',
                'userImage' => 'images/assets/users/Telma/Vb04qYonyrMY3Jl41Yi0BtRI6I03Th2s7WX5Rafy.png',
                'dateJoined' => '2023-08-31 14:15:30',
                'userLocation' => 'Esch Alzette',
                'userRating' => 0.0,
                'banUser' => 0,
                'userPhone' => '691734587',
                'paymentInfo' => 'Card',
                'email' => 'telmavieira1984@hotmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$YmsxK1OuUnx9RNQbeWcIwO3O6f5RLv3ZU4WmSx2AdQlr6WHjgEH6.',
                'remember_token' => NULL,
                'role' => 'admin',
                'created_at' => '2023-08-31 12:15:30',
                'updated_at' => '2023-08-31 12:15:30',
                'deleted_at' => NULL
            ],
            [
                'id' => 3,
                'userName' => 'Arthur',
                'userImage' => 'images/assets/users/Arthur/ReIaUsdDd9XVgkN4ujEmVhKU3CJZ4DV5YauXzGAz.png',
                'dateJoined' => '2023-08-31 14:18:32',
                'userLocation' => 'Esch sur Alzette, Luxembourg',
                'userRating' => 0.0,
                'banUser' => 0,
                'userPhone' => '+33 7 87 43 83 39',
                'paymentInfo' => 'Card',
                'email' => 'louis.arthur.michel@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$8DOnEfF5kNLcsEsbfz57ueMHn0PpXLQxoatqls7BddJ2vBA7IZ4m.',
                'remember_token' => NULL,
                'role' => 'admin',
                'created_at' => '2023-08-31 12:18:32',
                'updated_at' => '2023-08-31 12:18:32',
                'deleted_at' => NULL
            ],
            [
                'id' => 4,
                'userName' => 'Cristian',
                'userImage' => 'images/assets/users/Cristian/I1Ko2d82LGQYAsvt2NyEW6fmhA0C5lybQQQSdi7g.png',
                'dateJoined' => '2023-08-31 14:20:54',
                'userLocation' => 'Luxembourg',
                'userRating' => 0.0,
                'banUser' => 0,
                'userPhone' => '661850551',
                'paymentInfo' => 'Card',
                'email' => 'bariscristian@hotmail.it',
                'email_verified_at' => NULL,
                'password' => '$2y$10$iUD3dEh5nL3fO79tAnjNRuc7ytSyvyIJRIC/kKtCYxK2Tq8/owHKy',
                'remember_token' => NULL,
                'role' => 'admin',
                'created_at' => '2023-08-31 12:20:54',
                'updated_at' => '2023-08-31 12:20:54',
                'deleted_at' => NULL
            ],
            [
                'id' => 5,
                'userName' => 'Lucas',
                'userImage' => 'images/assets/users/Lucas/eXWy1PGwOosrjvh8a7ztbw4Nb0FKYrm0TivPkgnV.png',
                'dateJoined' => '2023-08-31 14:23:59',
                'userLocation' => 'luxembourg',
                'userRating' => 0.0,
                'banUser' => 0,
                'userPhone' => '00352661253997',
                'paymentInfo' => 'Card',
                'email' => 'lucasribeiropereira@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$RvKp7sjNqXH96BtR8edpIOusfli77jHRt.wfMfypUE2p80uPh0jvu',
                'remember_token' => NULL,
                'role' => 'admin',
                'created_at' => '2023-08-31 12:23:59',
                'updated_at' => '2023-08-31 12:23:59',
                'deleted_at' => NULL
            ]
        ]);
    }
}