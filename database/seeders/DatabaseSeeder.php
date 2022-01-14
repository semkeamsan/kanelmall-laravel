<?php

namespace Database\Seeders;

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

        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            ChatManagerSeeder::class,
            ProvinceTableSeeder::class,
            DistrictTableSeeder::class,
            CommuneTableSeeder::class,
            //VillageTableSeeder::class
            UserSeeder::class,

        ]);
        // \App\Models\User::factory(50)->create();

        currency()->create([
            'name' => 'U.S. Dollar',
            'code' => 'USD',
            'symbol' => '$',
            'format' => '$1,00.00',
            'exchange_rate' => 1,
            'active' => 1,
        ]);
        currency()->create([
            'name' => 'Khmer Money',
            'code' => 'KHR',
            'symbol' => '៛',
            'format' => '៛41,00.00',
            'exchange_rate' => 4100,
            'active' => 1,
        ]);

    }
}
