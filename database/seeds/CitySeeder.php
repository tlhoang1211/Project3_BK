<?php

use App\City;
use Carbon\Carbon;
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
        $data_check = City::all()->first();
        if ($data_check != null)
        {
            Schema::disableForeignKeyConstraints();
            City::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

        $roles = array(
            array(
                'name'       => 'HaNoi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'status'     => 1
            ),
            array(
                'name'       => 'HoChiMinh',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'status'     => 1
            ),
        );
        City::insert($roles);
    }
}
