<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScreenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $seeds = [
        ['id' => 1],
        ['id' => 2],
        ['id' => 3],
      ];

      foreach ($seeds as $seed) {
        DB::table('screens')->insert($seed);
      }
    }
}
