<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            'title' => 'Lokys',
            'code' => '111',
            'address' => 'Stiklių g. 8',
            ]);

            DB::table('restaurants')->insert([
            'title' => 'Da Antonio',
            'code' => '222',
            'address' => 'Vilniaus g. 23',
            ]);

            DB::table('restaurants')->insert([
            'title' => 'Casa Della Pasta',
            'code' => '333',
            'address' => 'Universiteto g. 4',
            ]);


            DB::table('menus')->insert([
                'menu_title' => 'Sriubos',
                'restaurant_id' => 1,
            ]);

            DB::table('menus')->insert([
                'menu_title' => 'Desertai',
                'restaurant_id' => 2,
            ]);

            DB::table('menus')->insert([
                'menu_title' => 'Gėrimai',
                'restaurant_id' => 3,
            ]);

            DB::table('dishes')->insert([
                'dish_title' => 'Charčio',
                'menu_id' => 1,
                'description' => '',
                'image_path' => '',
                ]);

            DB::table('dishes')->insert([
                'dish_title' => 'Sultinys',
                'menu_id' => 1,
                'description' => '',
                'image_path' => '',
                ]);

            DB::table('dishes')->insert([
                'dish_title' => 'Šaltibarščiai',
                'menu_id' => 1,
                'description' => '',
                'image_path' => '',
                ]);


            DB::table('dishes')->insert([
                    'dish_title' => 'Ledai',
                    'menu_id' => 2,
                'description' => '',
                'image_path' => '',
                ]);

            DB::table('dishes')->insert([
                    'dish_title' => 'Tiramisu',
                    'menu_id' => 2,
                'description' => '',
                'image_path' => '',
                ]);

            DB::table('dishes')->insert([
                    'dish_title' => 'Prancūziškas skrebutis',
                    'menu_id' => 2,
                'description' => '',
                'image_path' => '',
                ]);

            DB::table('dishes')->insert([
                    'dish_title' => 'Coca-Cola',
                    'menu_id' => 3,
                'description' => '',
                'image_path' => '',
                ]);

            DB::table('dishes')->insert([
                    'dish_title' => 'Apelsinų sultys',
                    'menu_id' => 3,
                'description' => '',
                'image_path' => '',
                ]);

            DB::table('dishes')->insert([
                    'dish_title' => 'Vanduo',
                    'menu_id' => 3,
                'description' => '',
                'image_path' => '',
                ]);


    DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('1'),
        'role' => 10,
    ]);

    DB::table('users')->insert([
        'name' => 'user',
        'email' => 'user@gmail.com' ,
        'password' => Hash::make('2')
    ]);
    }
}
