<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(AccountSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(OriginSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ReceiptSeeder::class);
        $this->call(OrderDetailSeeder::class);
        $this->call(CommentSeeder::class);
    }
}
