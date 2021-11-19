<?php

use App\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Role::all()->first();
        if ($data_check != null)
        {
            Schema::disableForeignKeyConstraints();
            Role::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

        $roles = array(
            array(
                'name'       => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'name'       => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        );
        Role::insert($roles);
    }
}
