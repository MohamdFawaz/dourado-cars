<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::query()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123'),
            'activation' => true,
            'rest_code' => 'test123',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
