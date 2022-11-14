<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\File;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::count() > 0 ? User::first() : User::factory()->create();
        $ad = Ad::count() > 0 ? Ad::first() : Ad::factory()->create();

        File::factory(50)->create([
           'owner_id' => $user->id,
            'ad_id' => $ad->id,
            'ad_name' => $ad->title,
        ]);
    }
}
