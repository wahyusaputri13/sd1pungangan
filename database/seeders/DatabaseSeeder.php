<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\FrontMenu;
use App\Models\GuestBook;
use App\Models\RelatedLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Themes;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // NewsSeeder::class,
            // GallerySeeder::class,
            // BidangTusiSeeder::class,
        ]);

        $themes = [
            [
                'name' => 'flexstart',
                'image' => 'img/flexstart.png'
            ],
            [
                'name' => 'herobiz',
                'image' => 'img/herobiz.png'
            ],
            [
                'name' => 'arsha',
                'image' => 'img/arsha.png'
            ],
            [
                'name' => 'appway',
                'image' => 'img/appway.png'
            ],
            [
                'name' => 'anada',
                'image' => 'img/anada.png'
            ]
        ];

        foreach ($themes as $datum) {
            Themes::create($datum);
        }

        $role = [
            [
                'role' => 'Superadmin'
            ],
            [
                'role' => 'Admin'
            ]
        ];

        foreach ($role as $datum) {
            Role::create($datum);
        }

        $front_menu = [
            [
                'menu_name' => 'Main Menu'
            ]
        ];

        foreach ($front_menu as $ddd) {
            FrontMenu::create($ddd);
        }

        // \App\Models\User::factory(10)->create();
        DB::table('websites')->insert([
            'web_name' => 'Web2022',
            'web_description' => '"Hello World!"',
            'email' => 'diskominfo@wonosobokab.go.id',
            'address' => 'Wonosobo - The Soul Of Java',
            'phone' => '085643710007',
            'instagram' => '#',
            'twitter' => '#',
            'facebook' => '#',
            'youtube' => '#',
            'url_stream' => '#',
            'themes_front' => 'flexstart',
            'themes_back' => 'back.a',
            'open_hours' => 'Monday - Thursday (07:00AM - 04:00PM) Friday (07:00AM - 11:00AM)',
        ]);
        // DB::table('websites')->insert([
        //     'web_name' => 'KAMPUNG PANCASILA WONOSOBO',
        //     'web_description' => '"Semarak Kampung Pancasila Wonosobo penjaga Persatuan dan Kesatuan Bangsa!"',
        //     'email' => 'superadmin@app.com',
        //     'address' => 'Kodim 0707 Jl. Pemuda No.11, Wonosobo Timur, Wonosobo Tim., Kec. Wonosobo, Kabupaten Wonosobo, Jawa Tengah 56311',
        //     'phone' => '(0286) 321019',
        //     'instagram' => '#',
        //     'twitter' => '#',
        //     'facebook' => '#',
        //     'youtube' => '#',
        //     'url_stream' => '#',
        //     'themes_front' => 'FlexStart',
        //     'themes_back' => 'back.a',
        // ]);

        $user = [
            [
                'name' => 'malika',
                'email' => 'malika@app.com',
                'password' => bcrypt('password'),
                'role_id' => 1
            ],
            [
                'name' => 'admin',
                'email' => 'admin@app.com',
                'password' => bcrypt('password'),
                'role_id' => 2
            ]
        ];

        foreach ($user as $datum) {
            User::create($datum);
        }

        $related = [
            [
                'name' => 'Website Pemkab Wonosobo',
                'url' => 'https://website.wonosobokab.go.id/',
            ],
            [
                'name' => 'Dashboard Smartcity',
                'url' => 'https://smartcity.wonosobokab.go.id/',
            ],
            [
                'name' => 'Website Diskominfo Wonosobo',
                'url' => 'https://diskominnfo.wonosobokab.go.id/',
            ]
        ];

        foreach ($related as $rr) {
            RelatedLink::create($rr);
        }

        $component = [
            [
                'name' => 'Event',
                'active' => 0,
                'slug' => Str::slug('Event', '-'),
            ],
            [
                'name' => 'Guest Book',
                'active' => 0,
                'slug' => Str::slug('Guest Book', '-'),
            ],
            [
                'name' => 'Seputar Wonosobo',
                'active' => 0,
                'slug' => Str::slug('Seputar Wonosobo', '-'),
            ]
            // [
            //     'name' => 'Public Complaints',
            //     'active' => 0,
            //     'slug' => Str::slug('Complaints', '-'),
            // ]
        ];

        foreach ($component as $cp) {
            Component::create($cp);
        }

        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 50; $i++) {
            GuestBook::create([
                'name'  => $faker->name(),
                'date'  => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'instansi'  => $faker->company(3),
                'jumlah'  => $faker->randomDigit(),
                'keperluan'  => $faker->sentence()
            ]);
        }
    }
}
