<?php

use App\Scopes\IdScope;
use App\User;
use Illuminate\Support\Str;
use App\Task;
Route::get('1',function (){
    dd(Task::find(1,['preview','description']));
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('test', 'TaskController@index');

Route::post('test/{id}', 'TaskController@test');

Route::get('create',function (){
    $task=Task::find(1);
    return view('test1', compact('task'));
});
Route::get('main', 'TaskController@index');
Route::get('train/{id}', 'TaskController@train');
Route::get('create',function (){
    $task=Task::find(1);
    return view('create_view', compact('task'));
});

Route::post('createtask','TaskController@create');

//Route::get('/test/{id}',function ($id){
//    $task=Task::findOrFail($id);
//    return view('test',compact('task'));
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


