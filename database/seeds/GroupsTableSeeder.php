<?php

use Illuminate\Database\Seeder;
use App\Group;
class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Group();
        $group->name = 'PHP6';
        $group->save();

        $group = new Group();
        $group->name = 'PHP7';
        $group->save();

        $group = new Group();
        $group->name = 'PHP8';
        $group->save();

        $group = new Group();
        $group->name = 'PHP9';
        $group->save();
    }
}