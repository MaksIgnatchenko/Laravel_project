<?php

use Illuminate\Database\Seeder;
use App\TaskList;
class TasklistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Tasklist();
        $group->name = 'Modul1';
        $group->save();

        $group = new Tasklist();
        $group->name = 'Modul2';
        $group->save();

        $group = new Tasklist();
        $group->name = 'Modul3';
        $group->save();

        $group = new Tasklist();
        $group->name = 'Modul4';
        $group->save();
    }
}