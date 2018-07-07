<?php
use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin account
        $account = new User();
        $account->name = 'admin';
        $account->email = 'admin@gmail.com';
        $account->password = bcrypt('test123');
        $account->role = 'admin';
        $account->save();
        //Teacher account
        $account = new User();
        $account->name = 'teacher';
        $account->email = 'teacher@gmail.com';
        $account->password = bcrypt('test123');
        $account->role = 'teacher';
        $account->save();
        //User account
        $account = new User();
        $account->name = 'user';
        $account->email = 'user@gmail.com';
        $account->password = bcrypt('test123');
        $account->role = 'user';
        $account->save();
        //User2 account
        $account = new User();
        $account->name = 'user2';
        $account->email = 'user2@gmail.com';
        $account->password = bcrypt('test123');
        $account->role = 'user';
        $account->save();
        //User3 account
        $account = new User();
        $account->name = 'user3';
        $account->email = 'user3@gmail.com';
        $account->password = bcrypt('test123');
        $account->role = 'user';
        $account->save();
    }
}