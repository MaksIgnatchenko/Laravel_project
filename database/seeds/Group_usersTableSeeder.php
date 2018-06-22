<?php

use Illuminate\Database\Seeder;
use App\GroupUser;

class Group_usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relation = new GroupUser();
        $relation->user_id = 1;
        $relation->group_id = 1;
        $relation->save();

        $relation = new GroupUser();
        $relation->user_id = 1;
        $relation->group_id = 2;
        $relation->save();

        $relation = new GroupUser();
        $relation->user_id = 2;
        $relation->group_id = 2;
        $relation->save();

        $relation = new GroupUser();
        $relation->user_id = 2;
        $relation->group_id = 3;
        $relation->save();
    }
}
