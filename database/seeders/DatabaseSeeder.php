<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'email' => 'admin@admin.com',
                'password' => \Hash::make('admin'),
            ]);

        $this->call(CardSeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderDetailSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(PaymentDetailSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductStoreSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(UserSeeder::class);
    }
}
