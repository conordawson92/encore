<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log; // Import the Log facade

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Log::info('Starting ItemsTableSeeder');
        $this->call([
            PersonalAccessTokensTableSeeder::class,
            PasswordResetTokensTableSeeder::class,
            FailedJobsTableSeeder::class,
            UsersTableSeeder::class,
            ParentCategoriesTableSeeder::class,
            CategoriesTableSeeder::class,
            ItemsTableSeeder::class,
            TransactionsTableSeeder::class,
            WishlistsTableSeeder::class,
            TypeNotificationsTableSeeder::class,
            NotificationsTableSeeder::class,
            MessagesTableSeeder::class,
            ReviewsTableSeeder::class,
        ]);
        Log::info('ItemsTableSeeder completed');
    }
}
