<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\HelloRequest; //追記
use Validator;  //追記

class HelloController extends Controller
{
    public function index(Request $request)
    {
        return view('hello.index', ['msg'=>'formを入力ください']);
    }

    public function post(HelloRequest $request)
    {
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }
}

// public function post(Request $request)
// {
//     $rules = [
//         'name' => 'required',
//         'mail' => 'email',
//         'age' => 'numeric|between:0,150',
//     ];
//     $messages = [
//         'name.required' => '名前を入れてください',
//         'mail.email' => 'メ-ルアドレスが必要です',
//         'age.numeric' => '年齢は整数で',
//         'age.min' => '年齢は零歳以上で入力を',
//         'age.between' => '年れには０から１５０で入れてください',
//     ];

//     $validator = Validator::make($request->all(), $rules, $messages);

//     $validator->sometimes('age', 'min:0', function($input){
//         return !is_int($input->age);
//     });

//     $validator->sometimes('age', 'max:200', function($input){
//         return !is_int($input->age);
//     });

//     if ($validator->fails()){
//         return redirect('/hello')
//                     ->withErrors($validator)    
//                     ->withInput();
//     }
//     return view('hello.index', ['msg'=>'正しく入力されました！']);
// }

// public function index(Request $request)
// {
//     $validator = Validator::make($request->query(), [
//         'id' => 'required',
//         'pass' => 'required',
//     ]);
//     if ($validator->fails()){
//         $msg = 'クエリに問題があります';
//     } else {
//         $msg = 'ID/Passを受け付けました';
//     }
//     return view('hello.index', ['msg'=>$msg, ]);
// }


// public function post(Request $request)
// {            
//     $validator = Validator::make($request->all(), [
//         'name' => 'required',
//         'mail' => 'email',
//         'age' => 'numeric|between:0,150',
//     ]);
//     if ($validator->fails()){
//         return redirect('/hello')
//                     ->withErrors($validator)
//                     ->withInput();
//     }
//     return view('hello.index', ['msg'=>'正しく入力されました！']);
// }

// return view('hello.index', ['message'=>'Hello!']);
// return view('hello.index', ['data'=>$request->data]);
// return view('hello.index',['msg'=>'フォームを入力: ']);

// $validate_rule = [
//     'name' => 'required',
//     'mail' => 'email',
//     'age' => 'numeric|between:0,150',
// ];
// $this->validate($request, $validate_rule);
// return view('hello.index', ['msg'=>'正しく入力されました！']);

// public function index()
// {
//     $data = [
//         ['name'=>'山田', 'mail'=>'yamada'],
//         ['name'=>'田中', 'mail'=>'tanaka'],
//         ['name'=>'スズキ', 'mail'=>'suzuki']
//     ];
//     return view('hello.index', compact('data'));
// }

// public function index()
// {
//     $data = ['one','two','three','four','five'];
//     // return view('hello.index', ['data'=>$data]);
//     return view('hello.index', compact('data'));
// }

    // public function index(Request $request)
    // {
    //     //連想配列を渡している
    //     $data = [
    //         'msg'=>'お名前を入力してください',            
    //     ];
    //     return view('hello.index', $data);
    // }
    
    // public function post(Request $request)
    // {
    // $msg = $request->msg;
    // $data = [
    //     'msg'=>'こんにちは、' . $msg . 'さん',
    // ];
    // return view('hello.index', $data);
    // }


// public function index(Request $request)
// {
//     //連想配列を渡している
//     $data = [
//         'msg'=>'これはBladeを利用したサンプルです。',            
//     ];
//     return view('hello.index', $data);
// }

// public function index(Request $request)
// {
//     //連想配列を渡している
//     $data = [
//         'msg'=>'これはコントローラから渡されたMessageです',
//         //requestインスタンスを渡す
//         'id'=>$request->id
//     ];

//     return view('hello.index', $data);
// }

// public function index(Request $request, Response $response){

//     $html = <<<EOF
//         <html>
//         <head>
//         <title>Hello/Index</title>
//         <style>
//         body  {font-size:16pt; color#999; }
//         h1 {font-size:120pt; text-align:right; color:#fafafa;
//         margin:-50px 0px -120px 0px; }
//         </style>
//         </head>
//         <body>
//             <h1>Hello</h1>
//             <h3>Request</h3>
//             <pre>{$request}</pre>
//             <h3>Response</h3>
//             <pre>{$response}</pre>                
//         </body>
//         </html>
//     EOF;
//             $request->path();
//             $response->setContent($html);
//             return $response;
// }

// class HelloController extends Controller
// {
//     public function __invoke(){
//         return <<<EOF
//         <html>
//         <head>
//         <title>Invoke</title>
//         <style>
//         body  {font-size:16pt; color#999; }
//         h1 {font-size:30pt; text-align:right; color:#eee;
//         margin:-15px 0px 0px 0px; }
//         </style>
//         </head>
//         <body>
//             <h1>Single Action</h1>
//             <p>これはシングルアクションのコントローラのアクションです</p>
//         </body>
//         EOF;
//     }    
// }

//global変数
// global $head, $style, $body, $end;
// $head = '<html><head>';
// $style = <<<EOF
// <style>
// body {font-size:16pt; color:#999; }
// h1 { font-size:100pt; text-aign:right; color:#eee;
//     margin:-40px 0px -50px 0px; }
// </style>
// EOF;
// $body = '</head><body>';
// $end = '</body></html>';

// function tag($tag, $txt){
//     return "<{$tag}>" . $txt . "</{$tag}>";
// }

// class HelloController extends Controller
// {
//     public function index(){
//         global $head, $style, $body, $end;

//         $html = $head . tag('title','Hello/Index') . $style . $body
//                 . tag('h1','Index') . tag('p','this is Index page')
//                 . '<a href="/hello/other">go to Other page</a>'
//                 . $end;
//         return $html;
//     }    

//     public function other(){
//         global $head, $style, $body, $end;

//         $html = $head . tag('title', 'Hello/Other') . $style .
//             $body
//             . tag('h1','Other') . tag('p','this is Other page')
//             . $end;
//         return $html;
//     }
// }