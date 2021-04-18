<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::create([
            'id' => 0,
            'name' => 'admin',
            'email' => 'admindb@gmail.com',
            'is_admin' => 1,
            'status' => 1,
            'password' => \Hash::make("admin123"),
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
