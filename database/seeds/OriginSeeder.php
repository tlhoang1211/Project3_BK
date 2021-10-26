<?php

use App\Origin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data_check = Origin::all()->first();
        if ($data_check != null) {
            Schema::disableForeignKeyConstraints();
            Origin::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

        $origins = [
            [
                'name' => 'Ý',
                'slug' => 'y',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Pháp',
                'slug' => 'phap',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mỹ',
                'slug' => 'my',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tây Ban Nha',
                'slug' => 'tay_ban_nha',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Anh',
                'slug' => 'anh',
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Origin::insert($origins);
    }
}
