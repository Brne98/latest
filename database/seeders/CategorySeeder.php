<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        for($i=0; $i<4;$i++){
            $parent = Category::factory()->create();
            Category::factory(4-$i)->create(['parent_category' => $parent->id]);
        }




    }
}
