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
Route::post('/main}', 'TaskController@index')->name('get');
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
Route::get('deleteGroup/{group}', 'GroupController@deleteGroup');
Route::get('deleteUser/{user}', 'UserController@deleteUser');
Route::get('deleteTasklist/{tasklist}', 'TasklistController@deleteTasklist');


Route::get('users', 'GroupController@index');
Route::get('admingroup/{error?}', 'GroupController@index')->name('groups');
Route::post('admingroup', 'GroupController@index');
Route::post('creategroup', 'GroupController@create');
Route::post('addstudent', 'GroupController@addUser');
Route::post('addtasklist', 'GroupController@addTasklist');
Route::post('deletetasklist', 'GroupController@deleteTasklist');
Route::get('change-role/{user}', 'RoleRequestController@changeRole');

Route::get('/admintasklists', 'TasklistController@index')->name('tasklists');
Route::post('/admintasklists', 'TasklistController@menuStore')->name('taskListsStore');
Route::post('createtasklist', 'TasklistController@create');
Route::post('addtask', 'TasklistController@addTask');

// sociality routes
Route::get('auth/{provider}',
    [
        'as' => 'auth/{provider}',
        'uses' => 'SocialController@redirectToProvider'
    ]
);

Route::get('auth/{provider}/callback',
    [
        'as' => 'auth/{provider}/callback',
        'uses' => 'SocialController@handleProviderCallback'
    ]
);

Route::get('/account', 'AccountController@index');
Route::post('/changePassword', 'AccountController@changePassword')->name('changePassword');
Route::post('/changeMail', 'AccountController@changeMail');
Route::post('/changeName', 'AccountController@changeName');
Route::get('/user', 'AccountController@user');

Route::get('/adminusertasklists', 'UserController@showModules');
Route::get('/module-train/{tasklist}', 'TaskListController@moduleTrain');

Route::post('show-task', 'TaskController@showTask');
Route::post('ajaxTest', 'TaskController@ajaxTest');

Route::post('profile', 'UserController@userProfile');

Route::get('/total-marks/{group}', 'TotalMarkController@index');

Route::post('/change-role', 'RoleRequestController@store');
Route::get('/change-role-request', 'RoleRequestController@checkRequests');
Route::get('/show-requests', 'RoleRequestController@index');
Route::post('/apply-request', 'RoleRequestController@applyRequest');
Route::post('/decline-request', 'RoleRequestController@declineRequest');
Route::get('/ajax-users', 'AccountController@users');
Route::get('/ajax-marks', 'TotalMarkController@marks');
Route::get('/ajax-tasks', 'TaskController@tasks');
Route::get('/ajax-notification', 'NotificationController@index');
Route::get('/ajax-stopProcessed', 'NotificationController@stopProcessed');

Route::post('/ajax-modul-group', 'TotalMarkController@test');

