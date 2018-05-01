<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Lead::class, 100)->create()->each(function ($lead) {
            $lead->save();
        });
    }
}
