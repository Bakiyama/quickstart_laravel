<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Task;
use Illuminate\Http\Request;

/** 
 * タスク一覧表示
*/
Route::get('/', function () {
  //ビューを返す
  return view('tasks');
});

/**
 * 新タスク追加
 */
Route::post('/task', function (Request $request) {
  // 「Request $request」の記述がPOSTデータを取得する。上のuse Illuminate\Http\Request;がないとエラーが起きる
}); 

/**
 * タスク削除
 */
Route::delete('/task/{task}', function (Task $task) {
  //{task}という処理で消すタスクを特定し、function (Task $task)に送る。上のuse App\Task;がないとエラーが起こる
});