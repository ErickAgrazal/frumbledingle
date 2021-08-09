<?php

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location1 = new Location();
        $location1->name = 'Panama City';
        $location1->save();

        $location2 = new Location();
        $location2->name = 'Tampa Bay';
        $location2->save();
    }
}
