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
        $products = Product::all();
        $receipts = Receipt::all();
        $orderDetail = array();

        foreach ($receipts as $receipt)
        {
            for ($i = 0; $i < rand(1, 7); $i++)
            {
                $volume = $faker->randomElement(['10ml', '50ml', '90ml', '100ml']);
                $volume_number = doubleval((substr($volume, 0, -2)));
                $quantity = $faker->numberBetween(1, 8);
                $product = $faker->randomElement($products);

                $item = [
                    'product_id' => $product->id,
                    'receipt_id' => $receipt->id,
                    'volume'     => $volume,
                    'quantity'   => $quantity,
                    'price'      => $quantity * ($volume_number / 100.0) * $product->price,
                    'created_at' => $receipt->created_at,
                    'updated_at' => Carbon::now(),
                ];
                array_push($orderDetail, $item);
            }
        };

        OrderDetail::insert($orderDetail);
    }
}
