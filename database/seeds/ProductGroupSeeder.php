<?php

use Illuminate\Database\Seeder;

class ProductGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = DB::table('product_group')->get();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            DB::table('product_group')->truncate();
            Schema::enableForeignKeyConstraints();
        }
        $faker = \Faker\Factory::create();
        $product_group =  [
            [
                'product_id' => '1',
                'group_id' => '2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => '2',
                'group_id' => '2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => '3',
                'group_id' => '3',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ],
            [
                'product_id' => '4',
                'group_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]
          ];
//            \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
          \Illuminate\Support\Facades\DB::table('product_group')->insert($product_group);
           \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }
}
