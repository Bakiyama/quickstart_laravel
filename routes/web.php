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
    $tasks = Task::orderBy('created_at', 'asc')->get(); //Task::〜までがデータの並び替え、->get();はそれの取得で、文頭の = で代入する

  //ビューを返す
    return view('tasks', [ 
        'tasks' => $tasks
    ]);
});

/**
 * 新タスク追加
 */
Route::post('/task', function (Request $request) {
    // 「Request $request」の記述がPOSTデータを取得する。上のuse Illuminate\Http\Request;がないとエラーが起きる
    $validator = Validator::make($request->all(), [  //Validator⋯Laravelの標準クラス。
    'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
    return redirect('/')
    ->withInput()
    ->withErrors($validator);
    }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
}); 

/**
 * タスク削除
 */
Route::delete('/task/{task}', function (Task $task) {
    //{task}という処理で消すタスクを特定し、function (Task $task)に送る。上のuse App\Task;がないとエラーが起こる
    $task->delete();

    return redirect('/');
});