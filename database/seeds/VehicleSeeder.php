<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=0;$i<=100;$i++)
        {
            DB::table('vehicle')->insert([
                'merek' => $faker->word(),
                'model' => $faker->word(),
                'jenis' => $faker->word(),
                'year' => $faker->year(),
                'harga'=> $faker->numberBetween(60000000,250000000),
                'image' => $faker->word(),
            ]);
        }
    }
}
