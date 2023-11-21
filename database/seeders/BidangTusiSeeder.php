<?php

namespace Database\Seeders;

use App\Models\Bidang;
use App\Models\Tusi;
use Illuminate\Database\Seeder;

class BidangTusiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataArray = array(
            'TRANTIB' => [
                'PENGAMANAN',
                'PGOT',
                'ODGJ',
                'PKL',
                'CUKAI',
                'LAIN-LAIN'
            ],
            'GAKDA' => [
                'PENGAMANAN',
                'IMB',
                'REKLAME',
                'GALIAN C',
                'MIRAS',
                'KENAKALAN REMAJA',
                'LAIN-LAIN'
            ],
            'SEKRETARIAT ' => []
        );

        foreach ($dataArray as $language => $frameworks) {

            $language = Bidang::create([
                'name' => $language
            ]);

            if ($language) {
                foreach ($frameworks as $key => $framework) {
                    Tusi::create([
                        'bidang_id' => $language->id,
                        'name' => $framework
                    ]);
                }
            }
        }
    }
}
