<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $no = 1;

foreach (range(1, 6) as $number) {
    Kategori::create([
        'kategori_kelas' => $no++,
    ]);
}
         
    }
}
