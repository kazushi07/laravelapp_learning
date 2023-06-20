<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\HelloRequest; //追記
use Validator;  //追記
use Illuminate\Support\Facades\DB; //追記

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::table('people')->orderBy('age', 'asc')->get();
        return view('hello.show', ['items' => $items]);
    }

    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]); 
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,            
        ];
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request)
    {        
        $item = DB::table('people')
            ->where('id', $request->id)->first();
        return view('hello.edit', ['form' => $item]);
    }

    public function update(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')
            ->where('id', $request->id)
            ->update($param);
        return redirect('/hello');
    }

    public function del(Request $request)
    {
        $item = DB::table('people')
            ->where('id', $request->id)->first();
        return view('hello.del', ['form' => $item]);
    }

    public function remove(Request $request)
    {        
        DB::table('people')
            ->where('id', $request->id)->delete();
        return redirect('/hello');
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people')
            ->offset($page * 3)
            ->limit(3)
            ->get();
        return view('hello.show', ['items' => $items]);
    }
}


// public function del(Request $request)
// {
//     $param = ['id' => $request->id];
//     $item = DB::select('select * from people where id = :id', $param);
//     return view('hello.del', ['form' => $item[0]]);
// }

// public function remove(Request $request)
// {
//     $param = ['id' => $request->id];
//     DB::delete('delete from people where id = :id', $param);
//     return redirect('/hello');
// }

// public function edit(Request $request)
// {
//     $param = ['id' => $request->id];
//     $item = DB::select('select * from people where id = :id', $param);
//     return view('hello.edit', ['form' => $item[0]]);
// }

// public function update(Request $request)
// {
//     $param = [
//         'id' => $request->id,
//         'name' => $request->name,
//         'mail' => $request->mail,
//         'age' => $request->age,
//     ];
//     DB::update('update people set name = :name, mail = :mail, age = :age where id = :id', $param);
//     return redirect('/hello');
// }

// public function add(Request $request)
// {
//     return view('hello.add');
// }

// public function create(Request $request)
// {
//     $param = [
//         'name' => $request->name,
//         'mail' => $request->mail,
//         'age' => $request->age,            
//     ];
//     DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
//     return redirect('/hello');
// }

// public function show(Request $request)
// {
//     $min = $request->min;
//     $max = $request->max;
//     $items = DB::table('people')
//         ->whereRaw('age >= ? and age <= ?',
//         [$min, $max])->get();
//     return view('hello.show', ['items' => $items]);
// }

// public function index(Request $request)
// {
//     $items = DB::table('people')->get();
//     return view('hello.index', ['items' => $items]); 
// }



// public function show(Request $request)
// {
//     $min = $request->min;
//     $max = $request->max;
//     $items = DB::table('people')
//         ->whereRaw('age >= ? and age <= ?',
//         [$min, $max])->get();
//     return view('hello.show', ['items' => $items]);
// }

// public function show(Request $request)
// {
//     $name = $request->name;
//     $items = DB::table('people')
//         ->where('name', 'like', '%' . $name . '%')
//         ->orWhere('mail', 'like', '%' . $name . '%')
//         ->get();
//     return view('hello.show', ['items' => $items]);
// }


// public function show(Request $request)
// {
//     $id = $request->id;
//     $items = DB::table('people')->where('id', '<=', $id)->get();
//     return view('hello.show', ['items' => $items]);
// }

// public function show(Request $request)
// {
//     $id = $request->id;
//     $item = DB::table('people')->where('id', $id)->first();
//     return view('hello.show', ['item' => $item]);
// }


// public function index(Request $request)
// {
//     $items = DB::select('select * from people');
//     return view('hello.index', ['items' => $items]); 
// }

// public function index(Request $request)
// {
//     if (isset($request->id))
//     {
//         $param = ['id' => $request->id];
//         $items = DB::select('select * from people where id = :id', $param);
//     } else {
//         $items =DB::select('select * from people');
//     }
//     return view('hello.index', ['items' => $items]);
// }

// public function post(Request $request)
// {
//     $validate_rule = [
//         'msg' => 'required',
//     ];
//     $this->validate($request,$validate_rule);
//     $msg = $request->msg;
//     $response = response()->view('hello.index',
//         ['msg'=>'「' . $msg .
//         '」をクッキーに保存しました']);
//     $response->cookie('msg', $msg, 100);
//     return $response;
// }

// public function index(Request $request)
// {
//     $items = DB::select('select * from people');
//     return view('hello.index', ['items' => $items]);
// }

// public function index(Request $request)
// {
//     if ($request->hasCookie('msg'))
//     {
//         $msg = 'Cookie: ' . $request->cokkie('msg');
//     } else {
//         $msg = '※クッキーはありません';
//     }
//     return view('hello.index', ['msg'=> $msg]);
// }

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