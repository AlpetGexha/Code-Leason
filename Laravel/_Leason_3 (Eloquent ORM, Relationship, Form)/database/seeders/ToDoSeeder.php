<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

use Faker\Factory as Faker;

class ToDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *s
     * @return void
     */
    public function run()
    {

        $f = Faker::create();

        foreach (range(0, 20) as $i) {
            ToDo::create([
                'title' => $f->sentence(15),
                'completed' => 0
            ]);
        }



        //  per krijimin e  nje tabele

        ToDo::create([
            'title' => 'seeder test table',
            'completed' => 1,
        ]);
    }
}
