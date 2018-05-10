<?php

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsTableSeeder extends Seeder
{
    public function run()
    {
        $groups = factory(Group::class)->times(50)->make()->each(function ($group, $index) {
            if ($index == 0) {
                // $group->field = 'value';
            }
        });

        Group::insert($groups->toArray());
    }

}

