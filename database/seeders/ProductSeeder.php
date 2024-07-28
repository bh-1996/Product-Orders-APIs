<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Mobile 1',
            'user_id' => '1',
            'description' => "A telephone is a telecommunications device that permits two or more users to conduct a conversation.",
            'price' => '54.69'

        ]);
    }
}
