<?php

namespace Database\Seeders;

use App\Models\Ad;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::count() > 0 ? User::first() : User::factory()->create();

        Ad::factory(2)->create([
            'owner_id' => $user['id'],
            'category_id' => 1,
            'owner_name' => $user['name'],
            'owner_phone' => $user['phone'],
        ]);
        }

}
