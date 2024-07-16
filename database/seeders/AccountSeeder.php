<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('accounts')->insert([
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'name' => 'Admin',
                'role' => 'admin'
            ],
            [
                'username' => 'author',
                'password' => bcrypt('author'),
                'name' => 'Author',
                'role' => 'author'
            ],
        ]);
    }
}
