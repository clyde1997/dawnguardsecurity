<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class admincredentials extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('adminaccount')->insert([

            'name' => 'Rolando',
            'lastname' => 'Alimboyong Sr',
            'admin_username' => 'admin',
            'password' => Hash::make('DawnguardAgency2022!'),
            'created_at' => now(),
            'updated_at' => now()

        ]);
    }
}
