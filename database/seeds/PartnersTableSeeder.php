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
        $partners = factory(App\Models\Partner::class, 50)
            ->create()
            ->each(function ($partner) {
                $partner->properties()->save(factory(App\Models\Property::class)->make());
            });

    }
}
