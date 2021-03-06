<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 50 App\Models\Partner instances...
        $properties = factory(App\Models\Property::class, 50)->create();
    }
}
