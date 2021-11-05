<?php

use App\OrderDetail;
use App\Product;
use App\Receipt;
use Carbon\Carbon;
use Faker\Factory;
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
        $data_check = OrderDetail::all()->first();
        if ($data_check != null)
        {
            Schema::disableForeignKeyConstraints();
            OrderDetail::truncate();
            Schema::enableForeignKeyConstraints();
        }
        $faker = Factory::create();
        $product = Product::all();
        $receipts = Receipt::all();
        $orderDetail = array();
        for ($i = 0; $i < 20; $i++)
        {
            $item = [
                'product_id' => $faker->randomElement($product)->id,
                'receipt_id' => $faker->randomElement($receipts)->id,
                'volume'     => $faker->randomElement(['10ml', '50ml', '90ml', '100ml']),
                'quantity'   => $faker->numberBetween(1, 8),
                'price'      => $faker->randomNumber(3) * 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            array_push($orderDetail, $item);
        }

        OrderDetail::insert($orderDetail);
    }
}
