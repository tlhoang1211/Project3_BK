<?php

use App\Account;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Account::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Account::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

        Account::create(array(
            'role_id' => 2,
            'password' => Hash::make('admin'),
            'fullName' => 'adminer',
            'email' => 'admin@admin',
            'phoneNumber' => '084558392801',
            'email_verified' => 'verified',
            'sex' => 'Female',
            'birthDate' => '2002-07-29',
            'city_id' => 2,
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'address' => '1 Lang Ha'
        ));
        Account::create(array(
            'role_id' => 1,
            'password' => Hash::make('guest'),
            'fullName' => 'guest',
            'email' => 'guest@guest',
            'city_id' => 1,
            'sex' => 'Male',
            'birthDate' => '1996-05-22',
            'phoneNumber' => '084558392801',
            'email_verified' => 'verified',
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'address' => '2 Lang Ha'
        ));
//        $account = array(
//            array(
//                'userName' => 'admin',
//                'password' => md5("admin"."12345"),
//                'salt' => '12345',
//                'fullName' => 'adminer',
//                'email' => 'admin@admin',
//                'phoneNumber' => '084558392801',
//                'email_verified' => 'verified',
//                'status' => 1,
//                'created_at' => \Carbon\Carbon::now(),
//                'updated_at' => \Carbon\Carbon::now(),
//                ),
//
//        );
//        \Illuminate\Support\Facades\DB::table('accounts')->insert($user);
//        Account::insert($user);
    }
}
