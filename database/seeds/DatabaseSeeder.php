<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TasksTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(Group_usersTableSeeder::class);
        $this->call(TasklistsTableSeeder::class);
        $this->call(Tasklist_tasksTableSeeder::class);
    }
}
