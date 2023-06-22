<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Middleware\HelloMiddleware; //追記

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('hello', 'App\Http\Controllers\HelloController@index');
Route::get('hello', 'App\Http\Controllers\HelloController@index');
    // ->middleware('helo'); //protected $middlewareGroups への'helo'グループ追加に伴い追記
    // ->middleware(HelloMiddleware::class); //global middlewareをkernel.phpに登録した事により不要
Route::post('hello', 'App\Http\Controllers\HelloController@post');

//DB操作用
Route::get('hello/add', 'App\Http\Controllers\HelloController@add');
Route::post('hello/add', 'App\Http\Controllers\HelloController@create');

Route::get('hello/edit', 'App\Http\Controllers\HelloController@edit');
Route::post('hello/edit', 'App\Http\Controllers\HelloController@update');

Route::get('hello/del', 'App\Http\Controllers\HelloController@del');
Route::post('hello/del', 'App\Http\Controllers\HelloController@remove');

Route::get('hello/show', 'App\Http\Controllers\HelloController@show');

Route::get('person', 'App\Http\Controllers\PersonController@index');

Route::get('person/find', 'App\Http\Controllers\PersonController@find');
Route::post('person/find', 'App\Http\Controllers\PersonController@search');

Route::get('person/add', 'App\Http\Controllers\PersonController@add');
Route::post('person/add', 'App\Http\Controllers\PersonController@create');

Route::get('person/edit', 'App\Http\Controllers\PersonController@edit');
Route::post('person/edit', 'App\Http\Controllers\PersonController@update');

Route::get('person/del', 'App\Http\Controllers\PersonController@delete');
Route::post('person/del', 'App\Http\Controllers\PersonController@remove');

// Route::get('hello', function () {
//     return view('hello.index');
// });

// Route::get('/', function () {
//     return view('welcome');
// });

//コントローラHelloControllerへルーティング
//コントローラ名＠アクション名を記載
//第一引数のアドレスに接続すると第2引数として呼ばれる
//Route::get('/hello', 'App\Http\Controllers\HelloController@index');
//Route::get('hello/{id?}/{pass?}', 'App\Http\Controllers\HelloController@index');
// Route::get('hello', 'App\Http\Controllers\HelloController@index');
// Route::get('hello/other', 'App\Http\Controllers\HelloController@other');
// Route::get('hello', 'App\Http\Controllers\HelloController@index');

// Route::get('hello/{msg?}',function($msg='no message!'){
//     $html = <<<EOF
//     <html>
//     <head>
//     <title>Hello</title>
//     <style>
//     body {font-size:100pt; text-align:right; color:#eee;
//         margin:-40px 0px -50px 0px; }
//     </style>
//     </head>
//     <body>
//         <h1>Hello</h1>
//         <p>{$msg}</p>
//         <p>サンプルページです</p>
//     </body>
//     </html>
//     EOF;

//     return $html;
// });
