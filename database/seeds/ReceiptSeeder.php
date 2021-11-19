<?php

use App\Receipt;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ReceiptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Receipt::all()->first();
        if ($data_check != null)
        {
            Schema::disableForeignKeyConstraints();
            Receipt::truncate();
            Schema::enableForeignKeyConstraints();
        }
        $faker = Factory::create();

        $receipts = array();
        for ($i = 1; $i < 7; $i++)
        {
            $item = [
                'account_id'   => 2,
                'total_money'  => $faker->randomNumber(4) * 1000,
                'ship_name'    => $faker->name,
                'name_address' => $faker->address,
                'phone'        => $faker->phoneNumber,
                'note'         => $faker->realText(),
                'status'       => $faker->numberBetween(0, 2),
                'created_at'   => $faker->dateTimeThisDecade('now'),
                'updated_at'   => Carbon::now(),
            ];
            array_push($receipts, $item);
        }

        Receipt::insert($receipts);
    }
}
