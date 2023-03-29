<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        #php artisan migrate:fresh --seed - fshij te gjitha te thenat dhe krijo te reja "ToDoSeeder"
        $this->call(ToDoSeeder::class);
    }
}
