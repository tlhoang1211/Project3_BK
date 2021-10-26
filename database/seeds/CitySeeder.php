<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = \App\City::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            \App\City::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

        $roles = array(
            array(
                'name' => 'HaNoi',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'status' => 1
                ),
            array(
                'name' => 'HoChiMinh',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                'status' => 1
                ),
        );
        \App\City::insert($roles);
    }
}
