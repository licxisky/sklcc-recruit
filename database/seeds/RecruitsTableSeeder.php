<?php

use Illuminate\Database\Seeder;
use App\Models\Recruit;

class RecruitsTableSeeder extends Seeder
{
    public function run()
    {
        $recruits = factory(Recruit::class)->times(50)->make()->each(function ($recruit, $index) {
            if ($index == 0) {
                // $recruit->field = 'value';
            }
        });

        Recruit::insert($recruits->toArray());
    }

}

