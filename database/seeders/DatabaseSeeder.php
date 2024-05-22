<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Sheet;
use App\Models\Screen;
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
        // Movie::factory(10)->create();
        $this->call(ScreenTableSeeder::class);
        $this->call(SheetTableSeeder::class);
    }
}