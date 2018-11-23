<?php

use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 50 App\Partner instances...
        $partners = factory(App\Partner::class, 50)->create();
    }
}
