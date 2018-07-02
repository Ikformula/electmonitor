<?php

use Illuminate\Database\Seeder;
use App\Models\Place;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Place::class, 200)->create();
    }
}
