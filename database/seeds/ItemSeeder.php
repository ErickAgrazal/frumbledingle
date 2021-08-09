<?php

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item1 = new Item();
        $item1->name = 'Subaru big SF intake system WRX 2015-2021';
        $item1->price = 425.00;
        $item1->location_id = 1;
        $item1->category_id = 3;
        $item1->save();

        $item2 = new Item();
        $item2->name = 'Subaru Redline Carbon Fiber Intake 2015-2021';
        $item2->price = 650.00;
        $item2->location_id = 1;
        $item2->category_id = 3;
        $item2->save();

        $item3 = new Item();
        $item3->name = 'Subaru SF Intake + Airbox';
        $item3->price = 365.00;
        $item3->location_id = 1;
        $item3->category_id = 3;
        $item3->save();

        $item4 = new Item();
        $item4->name = 'Subaru Silicone Turbo Inlet V2 STI 2008-2021';
        $item4->price = 195.00;
        $item4->location_id = 1;
        $item4->category_id = 5;
        $item4->save();

        $item5 = new Item();
        $item5->name = 'Subaru EJ Turbo Blanket';
        $item5->price = 155.00;
        $item5->location_id = 2;
        $item5->category_id = 7;
        $item5->save();

        $item6 = new Item();
        $item6->name = 'Subaru top Mount Intercooler Black 2015-2021';
        $item6->price = 795.00;
        $item6->location_id = 2;
        $item6->category_id = 6;
        $item6->save();

        $item7 = new Item();
        $item7->name = 'Subaru top Mount Intercooler Silver 2015-2021';
        $item7->price = 795.00;
        $item7->location_id = 2;
        $item7->category_id = 6;
        $item7->save();
    }
}
