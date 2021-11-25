<?php

use App\Account;
use App\Comment;
use App\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $data_check = Comment::all()->first();
        if ($data_check !== null)
        {
            Schema::disableForeignKeyConstraints();
            Comment::query()->truncate();
            Schema::enableForeignKeyConstraints();
        }

        $faker = Factory::create();

        Product::all()->each(static function ($item, $key) use ($faker) {
            for ($i = 0; $i < random_int(2, 5); $i++)
            {
                Comment::create([
                    'title'      => $faker->sentence,
                    'rate'       => random_int(1, 5),
                    'body'       => $faker->paragraph,
                    'account_id' => Account::all()->random()->id,
                    'product_id' => $item->id,
                ]);
            }
        });
    }
}
