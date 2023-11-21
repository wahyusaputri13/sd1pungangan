<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 20; $i++) {
            Gallery::create([
                'name'  => $faker->word(),
                'description'  => $faker->sentence(5),
            ]);
        }
    }
}
