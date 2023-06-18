<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

// use Validator; //追加
use Illuminate\Support\Facades\Validator; //Validator::extends 使用時にエラーが出るためこちらに変更

use App\Http\Validators\HelloValidator; //追加

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
public function boot(): void
{
    Validator::extends('hello', function($attribute, $value, $parameters, $validator){
        return $value % 2 == 0;
    });
}
}

//↓この書換でエラーが起こる、P157 リスト4-32
//Call to undefined method Illuminate\Validation\Factory::extends()
// public function boot(): void
// {
//     Validator::extends('hello', function($attribute, $value, $parameters, $validator){
//         return $value % 2 == 0;
//     });
// }
//↑エラーここまで

// public function boot(): void
// {
//     $validator = $this->app['validator'];
//     $validator->resolver(function($translator, $data, $rules, $messages){
//         return new HelloValidator($tarnslator, $data, $rules, $messages);
//     });
// }


// public function boot(): void
// {
//     $validator = $this->app['validator'];
//     $validator->resolver(function($translator, $data, $rules, $messages){
//         return new HelloValidator($translator, $data, $rules, $messages);
//     });
// }

// public function boot(): void
// {
//     View::composer(
//         'hello.index', 'App\Http\Composers\HelloComposer'
//     );
// }