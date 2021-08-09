<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new Category();
        $category1->name = 'Access Port';
        $category1->save();

        $category2 = new Category();
        $category2->name = 'Air Induction';
        $category2->save();

        $category2_1 = new Category();
        $category2_1->name = 'Short Ram Intakes';
        $category2_1->parent_id = 2;
        $category2_1->save();

        $category2_2 = new Category();
        $category2_2->name = 'Air Boxes';
        $category2_2->parent_id = 2;
        $category2_2->save();

        $category2_3 = new Category();
        $category2_3->name = 'Turbo Inlet Hoses';
        $category2_3->parent_id = 2;
        $category2_3->save();

        $category3 = new Category();
        $category3->name = 'Cooling';
        $category3->save();

        $category4 = new Category();
        $category4->name = 'Turbo';
        $category4->save();

        $category5 = new Category();
        $category5->name = 'Exhaust';
        $category5->save();
    }
}
