<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' =>'Appareil électriques'
        ]);
        Category::create([
            'name' =>'Appareil electoniques usagés'
        ]);
        Category::create([
            'name' =>'Outils Industriels'
        ]);
        Category::create([
            'name' =>'Dechet organiques'
        ]);
    }
}
