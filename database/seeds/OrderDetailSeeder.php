<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = \App\OrderDetail::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            \App\OrderDetail::truncate();
            Schema::enableForeignKeyConstraints();
        }
        $faker = \Faker\Factory::create();
        $product = \App\Product::all();
        $receipts = array();
        for ($i = 0; $i < 20; $i++) {
            $item = [
                'productId' => $faker->randomElement($product)->id,
                'volume' => $faker->randomElement(['10ml','50ml','90ml','100ml']),
                'quantity' => $faker->numberBetween(1, 8),
                'price' => $faker->randomNumber(3) * 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            array_push($receipts, $item);
        }

        \App\OrderDetail::insert($receipts);
    }
}
