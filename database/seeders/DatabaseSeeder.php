<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Picture;
use App\Models\User;
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
         $this->call(UserSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(AdSeeder::class);
         $this->call(PictureSeeder::class);
        $this->call(ChildCategory::class);
    }
}
