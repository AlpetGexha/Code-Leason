<?php

namespace Database\Seeders;

use App\Models\CategoryOneToMany;
use App\Models\CategoryOneToManyModel;
use App\Models\DrejtimiOneToManyModel;
use App\Models\Post;
use App\Models\PostOneToManyModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OneToManySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $faker = Faker::create();
        $drejtimet = [
            'Makineri',
            'Trafik Rrugor',
            'Elektroteknik',
            'Ndertimtari',
            'Tekstil',
            'Art pamor',
        ];

        $categorys = [
            'Automekanik',
            'Operator Prodhimi',
            'Transport Rrugor',
            'Informatika',
            'Instalues Elektrik',
            'Energjetika',
            'Art pamor',
            'Arkitektur',
            'Ndertimtari',
            'Rrobaqepsi',
            'Disajn i Veshjeve'
        ];

        foreach ($categorys as $c) {
            PostOneToManyModel::create([
                'title' => $faker->sentence(4),
            ]);
            CategoryOneToMany::create([
                'title' => $c,
                'categoryable_id' => $faker->numberBetween(1, 4),
                'categoryable_type' => PostOneToManyModel::class,
            ]);
        }

        foreach ($drejtimet as $d) {
            DrejtimiOneToManyModel::create([
                'title' => $faker->sentence(4),
            ]);

            CategoryOneToMany::create([
                'title' => $d,
                'categoryable_id' => $faker->numberBetween(1, 4),
                'categoryable_type' => DrejtimiOneToManyModel::class,
            ]);

        }
    }
}
