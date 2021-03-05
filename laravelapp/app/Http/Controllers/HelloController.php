<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\HelloRequest;
use Validator;
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
        //クッキーの取得と表示p164
        if($request->hasCookie('msg')){
            $msg ='Cookie:'.$request->cookie('msg');
        }else{
            $msg = '※クッキーはありません。';
        }

        return view('hello.index',['msg' => $msg]);

        // オリジナルのバリデータを使うp156
        // return view("hello.index", ["msg" => "フォームを入力してください。"]);
         // クエリ文字列にバリデータを適用するp147
        //  $validator = Validator::make($request->query(),[
        //     'id' => 'required',
        //     'pass' => 'required',
        // ]);
        // if($validator->fails()){
        //     $msg = 'クエリーに問題があります。';
        // }else{
        //     $msg = 'ID/PASSを受け付けました。フォームを入力ください。';
        // }
        // return view('hello.index',['msg'=>$msg,]);
        // return view("hello.index",['msg' =>"フォームを入力:"]);
        // return view('hello.index');

        // $message = "Hello!";
        // $data = ["message" => $message];

        // return view("hello.index",["data"=>$request->data]);
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

        //クッキーを読み書きする
        $validate_rule =[
            'msg' => 'required',
        ];
        $this->validate($request,$validate_rule);
        $msg = $request->msg;
        $response = response()->view('hello.index',['msg' =>'「'.$msg.'」クッキーを保存しました。']);
        $response->cookie('msg',$msg,100);
        return $response;



        // オリジナルのバリデータを使うp156
        // return view("hello.index",["msg" => "正しく入力されました。"]);
        //条件によってルールの追加p151
        // $rules = [
        //     'name' => 'required',
        //     'mail' => 'email',
        //     'age' => 'numeric',
        // ];
 
        //  $message = [
        //      'name.required' =>'名前は必ず入力してください。',
        //      'mail.email' =>'メールアドレスが必要です。',
        //      'age.numeric' =>'年齢を整数で記入ください。',
        //      'age.min' => '年齢は0以上で入力してください。',
        //      'age.max' => '年齢は200歳以下で入力してください。'
        //  ];
 
        //  $validator = Validator::make($request->all(),$rules,$message);
        //  $validator->sometimes('age', 'min:0', function($input){
        //     return is_numeric($input->age);
        //  });
        //  $validator->sometimes('age', 'max:200', function($input){
        //     return is_numeric($input->age);
        // });
 
        //  if($validator->fails()){
        //      return redirect('/hello')->withErrors($validator)
        //                                  ->withInput();
        //  }
        //  return view('hello.index',['msg'=>'正しく入力されました!']);
 


        // エラーメッセージのカスタマイズp148
    //    $rules = [
    //        'name' => 'required',
    //        'mail' => 'email',
    //        'age' => 'numeric|between:0,150',
    //    ];

    //     $message = [
    //         'name.required' =>'名前は必ず入力してください。',
    //         'mail.email' =>'メールアドレスが必要です。',
    //         'age.numeric' =>'年齢を整数で記入ください。',
    //         'age.between' =>'年齢は0~150の間で入力してください。',
    //     ];

    //     $validator = Validator::make($request->all(),$rules,$message);

    //     if($validator->fails()){
    //         return redirect('/hello')->withErrors($validator)
    //                                     ->withInput();
    //     }
    //     return view('hello.index',['msg'=>'正しく入力されました!']);


        //controllerにvalidationを書くp124
        // $validate_rule =[
        //     'name' =>'required',
        //     'mail' =>'email',
        //     'age' =>'numeric|between:0,150',
        // ];

        // $this->validate($request, $validate_rule);
        //return view('hello.index',['msg'=>'正しく入力されました!']);


        // validatorを作る場合p144
        // $validator = Validator::make($request->all(),[
        //     'name' =>'required',
        //     'mail' =>'email',
        //     'age' =>'numeric|between:0,150',
        // ]);
        // if($validator->fails()){
        //     return redirect('/hello')->withErrors($validator)
        //                                 ->withInput();
        // }
        // return view('hello.index',['msg'=>'正しく入力されました!']);
        
        
        // $msg = $request->msg;
        // $data = ['msg'=> $msg];
        // // $data = ['msg'=>'こんにちは、'.$msg .'さん！'];
        // return view('hello.index',$data);

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
