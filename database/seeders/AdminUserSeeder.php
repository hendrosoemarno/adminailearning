<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AdminUser::create([
            'username' => 'adminhendro',
            'password' => \Illuminate\Support\Facades\Hash::make('H3ndr0.Soemarno'),
            'nama' => 'Admin Hendro',
        ]);
    }
}
