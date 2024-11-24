<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'username'=>'jungnar',
            'First_name'=>'Daniel John',
            'Last_name'=>'Bucad',
            'email' => 'stem.danieljohnbucad@gmail.com',
            'password' => Hash::make('alyssa0516!lovelove'),
            'usertype' => 'superadmin',
        ]);
    }
}
