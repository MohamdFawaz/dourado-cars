<?php

namespace Database\Seeders;

use App\Models\CarMake;
use Illuminate\Database\Seeder;

class CarMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carMakes = [];
        $decodedMakes = json_decode(\File::get('public/js/vehicle-logotypes.json'), true);
        foreach ($decodedMakes as $make) {
            $carMakes[] = [
                'name' => $make['name'],
                'image' => $make['logotype']['uri'],
                'activation' => false,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        CarMake::query()->insert($carMakes);
    }
}
