<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarMake;
use App\Models\CarModel;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 100; $i++){
            $car = Car::create([
                'car_make_id' => CarMake::query()->inRandomOrder()->first()->id,
                'car_model_id' => CarModel::query()->inRandomOrder()->first()->id,
                'kilometers' => $faker->numberBetween(500, 1100),
                'year' => $faker->year(),
                'warranty' => $faker->boolean(),
                'price' => $faker->numberBetween(50000, 100000),
                'color' => $faker->colorName(),
                'number_of_doors' => $faker->numberBetween(1, 5),
                'number_of_cylinders' => $faker->numberBetween(3, 10),
                'horse_power' => $faker->numberBetween(300, 500),
            ]);

            foreach (getLocales() as $locale) {
                $car->translateOrNew($locale)->name = $faker->name();
            }

            foreach (getLocales() as $locale) {
                $car->translateOrNew($locale)->title = $faker->title();
            }

            foreach (getLocales() as $locale) {
                $car->translateOrNew($locale)->specs = $faker->name();
            }

            foreach (getLocales() as $locale) {
                $car->translateOrNew($locale)->transmission_type = $faker->name();
            }
            foreach (getLocales() as $locale) {
                $car->translateOrNew($locale)->body_type = $faker->name();
            }
            foreach (getLocales() as $locale) {
                $car->translateOrNew($locale)->fuel_type = $faker->name();
            }
            foreach (getLocales() as $locale) {
                $car->translateOrNew($locale)->additional_information = $faker->paragraph(2);
            }
            $car->save();
        }
    }
}
