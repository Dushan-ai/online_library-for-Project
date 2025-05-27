<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
            DB::table('admins')->insert([
            'email' => 'admin@gmail.com',
            'mobile_no' => '769563183',
            'password' => Hash::make('admin'), // encrypting 'admin'
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
