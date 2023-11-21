<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
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
            News::create([
                'upload_by' => $faker->name,
                'title'  => $faker->sentence(5),
                'slug'  => Str::slug($faker->sentence(5), '-'),
                'photo'  => $faker->word(),
                'date'  => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'description'  => $faker->paragraph(50),
            ]);
        }
    }
}
