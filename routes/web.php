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


Route::get('main', 'TaskController@index')->name('main');
Route::get('train/{task}', 'TaskController@train');
Route::get('next/{id}', 'TaskController@next');
Route::get('create',function (){

    $task= Task::find(1);
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



