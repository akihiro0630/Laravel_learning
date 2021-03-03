<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HelloMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $data = [
            ["name"=>"山田たろう", "mail"=>"taro@yamada"],
            ["name"=>"田中はなこ", "mail"=>"hanako@tanaka"],
            ["name"=>"鈴木さちこ", "mail"=>"sachico@suzuki"],
        ];
        $request->merge(["data" =>$data]);
        return $next($request);
    }
}
