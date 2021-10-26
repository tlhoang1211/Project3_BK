<?php

use App\Group;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Group::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Group::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

        $groups =  [
            [
              'name' => 'Huong thom group',
              'status' => 1,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'name' => 'ALo Group',
              'status' => 1,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'name' => 'Greek Group',
              'status' => 1,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
            [
              'name' => 'Group Britain',
              'status' => 1,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ],
          ];

          Group::insert($groups);
    }
}
