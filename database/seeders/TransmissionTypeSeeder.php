<?php

namespace Database\Seeders;

use App\Models\TransmissionType;
use Illuminate\Database\Seeder;

class TransmissionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transmissionsTypes  = [
            ['name' => 'manual', 'create_at' => now(), 'updated_at' => now()],
            ['name' => 'automatic', 'create_at' => now(), 'updated_at' => now()],
            ['name' => 'continuously_variable_transmission', 'create_at' => now(), 'updated_at' => now()],
            ['name' => 'semi_automatic', 'create_at' => now(), 'updated_at' => now()],
            ['name' => 'dual_clutch', 'create_at' => now(), 'updated_at' => now()],
        ];

        TransmissionType::query()->insert($transmissionsTypes);
    }
}
