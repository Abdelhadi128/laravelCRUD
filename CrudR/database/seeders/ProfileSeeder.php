<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('profiles')->insert([
        //     // 'name'=> 'abdelhadi',
        //     'name'=> Str::random(20),
        //     'email'=> Str::random(10).'@gmail.com' ,
        //     'password' => Hash::make('password'),
        // ]);

        Profile::factory(100)->create();
    }
}
