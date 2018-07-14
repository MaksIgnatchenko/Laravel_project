<?php

use App\Scopes\IdScope;
use App\User;
use Illuminate\Support\Str;
use App\Task;

Route::get('/', 'MainController@index');


Route::get('test', 'TaskController@index');

Route::get('next/{id}','TaskController@next');
Route::get('prew/{id}','TaskController@prew');
Route::get('test/{id}', 'TaskController@test');

Route::post('test/{task}', 'TaskController@test');


Route::get('main/{filter?}', 'TaskController@index')->name('main');
Route::get('train/{task}', 'TaskController@train');
Route::get('next/{id}', 'TaskController@next');
Route::get('create',function (){

    $task= Task::first();
    $example = true;
    return view('create_view', compact('task','example'));
});

Route::post('createtask','TaskController@create');
Route::post('check','TaskController@check');
Route::post('distribute/{task?}', 'TaskController@distribute');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('edit', 'TaskController@showedit');
Route::get('editTask/{task}', 'TaskController@edit');

Route::get('users', 'GroupController@index');
Route::get('admingroup/{error?}', 'GroupController@index')->name('groups');
Route::post('creategroup', 'GroupController@create');
Route::post('addstudent', 'GroupController@addUser');
Route::post('addtasklist', 'GroupController@addTasklist');
Route::post('show-task', 'TaskController@showTask');

Route::get('/admintasklists', 'TasklistController@index')->name('tasklists');
Route::post('/admintasklists', 'TasklistController@menuStore')->name('taskListsStore');
Route::post('createtasklist', 'TasklistController@create');
Route::post('addtask', 'TasklistController@addTask');

// sociality routes
Route::get('auth/google',
    [
        'as' => 'auth/google',
        'uses' => 'GoogleController@redirectToProvider'
    ]
);

Route::get('auth/google/callback',
    [
        'as' => 'auth/google/callback',
        'uses' => 'GoogleController@handleProviderCallback'
    ]
);

Route::get('/account', 'AccountController@index');
Route::post('/changePassword', 'AccountController@changePassword')->name('changePassword');
Route::get('/user', 'AccountController@user');

Route::get('/adminusertasklists', 'UserController@showModules');
Route::get('/module-train/{tasklist}', 'TaskListController@moduleTrain');

