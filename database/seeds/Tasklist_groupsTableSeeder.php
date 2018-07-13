<?php

use App\TasklistGroup;
use Illuminate\Database\Seeder;

class Tasklist_groupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relation = new  TasklistGroup();
        $relation->tasklist_id = 1;
        $relation->group_id = 1;
        $relation->save();

        $relation = new  TasklistGroup();
        $relation->tasklist_id = 2;
        $relation->group_id = 1;
        $relation->save();
    }
}
