<?php

use App\TasklistTask;
use Illuminate\Database\Seeder;

class Tasklist_tasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relation = new  TasklistTask();
        $relation->task_id = 1;
        $relation->tasklist_id = 1;
        $relation->save();

        $relation = new TasklistTask();
        $relation->task_id = 3;
        $relation->tasklist_id = 4;
        $relation->save();

        $relation = new TasklistTask();
        $relation->task_id = 2;
        $relation->tasklist_id = 4;
        $relation->save();

        $relation = new TasklistTask();
        $relation->task_id = 1;
        $relation->tasklist_id = 3;
        $relation->save();

        $relation = new TasklistTask();
        $relation->task_id = 1;
        $relation->tasklist_id = 2;
        $relation->save();

        $relation = new TasklistTask();
        $relation->task_id = 2;
        $relation->tasklist_id = 2;
        $relation->save();

        $relation = new TasklistTask();
        $relation->task_id = 2;
        $relation->tasklist_id = 3;
        $relation->save();
    }
}
