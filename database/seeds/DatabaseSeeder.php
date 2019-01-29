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
        // $this->call(UsersTableSeeder::class);
        DB::table('categories')->insert([
            'name' => 'Games',
        ]);
        DB::table('categories')->insert([
            'name' => 'Appels',
        ]);
        DB::table('categories')->insert([
            'name' => 'Bezems',
        ]);

        DB::table('products')->insert([
            'name' => 'Red dead redemption 2',
            'price' => '59',
            'category_id' => '1',
        ]);

        DB::table('products')->insert([
            'name' => 'Bezem talentools',
            'price' => '19',
            'category_id' => '3',
        ]);
        DB::table('products')->insert([
            'name' => 'Rode appel',
            'price' => '1',
            'category_id' => '2',
        ]);
        DB::table('products')->insert([
            'name' => 'Red dead redemption 3',
            'price' => '159',
            'category_id' => '1',
        ]);
        DB::table('products')->insert([
            'name' => 'Merk bezem',
            'price' => '9',
            'category_id' => '3',
        ]);
        DB::table('products')->insert([
            'name' => 'Groene appel',
            'price' => '1',
            'category_id' => '2',
        ]);
    }
}
