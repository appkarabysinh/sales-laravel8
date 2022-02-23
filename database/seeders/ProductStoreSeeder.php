<?php

namespace Database\Seeders;

use App\Models\ProductStore;
use Illuminate\Database\Seeder;

class ProductStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductStore::factory()
            ->count(5)
            ->create();
    }
}
