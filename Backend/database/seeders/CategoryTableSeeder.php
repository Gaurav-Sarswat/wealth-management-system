<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'title' => 'Crypto',
        ]);
        Category::create([
            'title' => 'Real Estate',
        ]);
        Category::create([
            'title' => 'Bonds',
        ]);
        Category::create([
            'title' => 'Equity',
        ]);
        Category::create([
            'title' => 'Private Equity',
        ]);
        Category::create([
            'title' => 'Forex',
        ]);
        Category::create([
            'title' => 'NFTs',
        ]);
        Category::create([
            'title' => 'Live Stock',
        ]);
        Category::create([
            'title' => 'Agro',
        ]);
        Category::create([
            'title' => 'Random',
        ]);
    }
}
