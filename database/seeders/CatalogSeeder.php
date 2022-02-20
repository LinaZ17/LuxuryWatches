<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('catalogs')->insert([
            'title' => "Women's fashion",
            'alias' => "Ladies Watch",
        ]);

        DB::table('catalogs')->insert([
            'title' => "Men's fashion",
            'alias' => "Mens Watch",
        ]);
    }
}
