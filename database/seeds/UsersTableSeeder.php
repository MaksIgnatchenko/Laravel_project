<?php
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;
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
        $account->name = 'Admin';
        $account->email = 'admin@gmail.com';
        $account->password = Hash::make('test123');
        $account->role = 'admin';
        $account->save();
        //Teacher account
        $account = new User();
        $account->name = 'Sergey';
        $account->email = 'teacher@gmail.com';
        $account->password = Hash::make('test123');
        $account->role = 'teacher';
        $account->save();
        //User account
        $account = new User();
        $account->name = 'Andrey';
        $account->email = 'user@gmail.com';
        $account->password = Hash::make('test123');
        $account->role = 'user';
        $account->save();
        //User2 account
        $account = new User();
        $account->name = 'Oleg';
        $account->email = 'user2@gmail.com';
        $account->password = Hash::make('test123');
        $account->role = 'user';
        $account->save();
        //User3 account
        $account = new User();
        $account->name = 'Vasya';
        $account->email = 'user3@gmail.com';
        $account->password = Hash::make('test123');
        $account->role = 'user';
        $account->save();
    }
}