<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
// global $head,$style,$body,$end;
// $head = '<html><head>';
// $style = <<<EOF
// <style>
// body {font-size:16pt color:#999; }
// h1 { font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
// </style>
// EOF;
// $body = '</hed><body>';
// $end = '</body></html>';

// function tag($tag, $txt){
//     return "<{$tag}>" . $txt . "</{$tag}>";

// }

class HelloController extends Controller
{

    public function index(Request $request){

        // $message = "Hello!";
        // $data = ["message" => $message];

        return view("hello.index",["data"=>$request->data]);
        // $data = ['one','two','three','four','five'];
        // $data = [
        //     ["name"=>"山田たろう","mail"=>"taro@yamada"],
        //     ["name"=>"田中はなこ","mail"=>"hanako@tanaka"],
        //     ["name"=>"鈴木さちこ","mail"=>"sachico@suzuki"],
        //     "message"=>"hello!"
        // ];
        // return view('hello.index',['data'=>$data]);
        // return view('hello.index');
        // $data = ['msg'=>'お名前を入力してください。'];
        // return view('hello.index',['msg'=>'']);

    }
    public function post(Request $request){
        $msg = $request->msg;
        $data = ['msg'=> $msg];
        // $data = ['msg'=>'こんにちは、'.$msg .'さん！'];
        return view('hello.index',$data);

    }
    // public function index(Request $request){
    //     $data = ['msg'=>'これはコントローラーから渡されたメッセージです。',
    //              'id'=>$request->id];
    //     return view('hello.index', $data);
    // }
    // public function index($id='zero'){
    //     $data = ['msg'=>'これはこんとろーらーから渡されたメッセージです。',
    //              'id'=>$id];
    //     return view('hello.index', $data);
    // }

    // public function index(Request $request, Response $response){
    //     $html =<<<EOF
    //     <html>
    //         <head>
    //             <title>Hello/Index</title>
    //             <style>
    //                 body {font-size:16pt color:#999; }
    //                 h1 { font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
    //             </style>
    //         </head>
    //         <body>
    //             <h1>Hello</h1>
    //             <h3>Request</h3>
    //             <pre>{$request}</pre>
    //             <h3>Response</h3>
    //             <pre>{$response}</pre>

            
    //         </body>
        
    //     </html>
    //     EOF;
    //     $response->setContent($html);
    //     return $response;

    // }
    // public function index(){
    //     global $head,$style,$body,$end;

    //     $html = $head . tag('title','Hello/Index') . $style . $body
    //     . tag('h1','Index') . tag('p','this is Index page')
    //     . '<a href="/hello/other">go to Other page </a>'
    //     . $end;
    //     return $html;
    // }
    // public function other(){
    //     global $head,$style,$body,$end;

    //     $html = $head . tag('title','Hello/Other') . $style . $body
    //     . tag('h1','Other') . tag('p','this is Other page')
    //     . $end;
    //     return $html;

    // }
}
