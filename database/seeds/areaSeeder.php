<?php

use Illuminate\Database\Seeder;
use App\area;
class areaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\area::class, 50)->create();
    }
}
