<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        
        Role::create(['name'=> 'admin']);
        Role::create(['name'=> 'vendeur']);
        Role::create(['name'=> 'pro']);
        Role::create(['name'=> 'particulier']);


    }
}
