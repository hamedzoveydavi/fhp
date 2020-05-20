<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\ConfirmmUser;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('welcome');
        }
    }


    protected function RediretctAfterLogin($request){

        $user = $request->user();
        $con = ConfirmmUser::where('userid',$user->id)->first();
    if (!empty ($con) ){
        if ($con->confirm = '1'){
            return route('/welcome');
        }
    abort('404','This User DeActivated !!');
    }
}


}
