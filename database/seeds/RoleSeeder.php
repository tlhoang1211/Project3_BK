<?php

use App\Role;
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
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            \App\Role::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

        $roles = array(
            array(
                'name' => 'user',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                ),
            array(
                'name' => 'admin',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
                ),
        );
        \App\Role::insert($roles);
    }
}
