<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Validators\HelloValidator;
use Validator;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend("hello",function ($attribute, $value, $parameters){
            return $value %2 == 0;
          });
        //  ルールを組み込むp154
        // $validator = $this->app["validator"];
        // $validator->resolver(function($translator, $data, $rules, $messages){
        //     return new HelloValidator($translator, $data, $rules, $messages);
        // });

        // View::composer(
        //     'hello.index',"App\Http\Composers\HelloComposer"
        // );

        

    }
}
