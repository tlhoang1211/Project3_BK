<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ReceiptOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = \Illuminate\Support\Facades\DB::table('receipt_order')->get()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            \Illuminate\Support\Facades\DB::table('receipt_order')->truncate();
            Schema::enableForeignKeyConstraints();
        }
        $faker = \Faker\Factory::create();
        $orders = \App\OrderDetail::all();
        $receipts_record = \App\Receipt::all();
        $receipts = array();
        foreach ($orders as $order){
            $item = [
                'receipt_id' => $faker->randomElement($receipts_record)->id,
                'order_id' => $order->id,
            ];
            array_push($receipts, $item);
        }

        \Illuminate\Support\Facades\DB::table('receipt_order')->insert($receipts);
    }
}
