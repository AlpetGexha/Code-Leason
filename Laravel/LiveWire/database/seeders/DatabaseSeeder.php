<?php

namespace Database\Seeders;

use App\Models\todo;
use Illuminate\Database\Seeder;
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
        $f = Faker::create();
        // todo::factory(100)->create();
        foreach (range(0, 250) as $i) {
            todo::create([
                'name' => $f->sentence(15),
                'action' => $f->randomElement([0, 1])
            ]);
        }
    }
}
