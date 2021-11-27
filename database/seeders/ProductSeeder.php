<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('products')->insert([
                // 'name' => $faker->bothify('?###??##'),
                'name' => $faker->word,
                'price' => $faker->randomFloat(2, 0, 10000),
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }
    }
}
