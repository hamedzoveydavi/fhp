<?php

namespace App\Http\Middleware;
use App\ConfirmmUser;
use App\User;
use Closure;
use Symfony\Component\Console\Input\Input;

class ConfirmUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

       $user = User::where('email',$request->input('email'))->with('confirmdata')->first();
        if(!empty($user) && $user->confirmdata->confirm == 0){
            return redirect('/login')->with('MsgDeAct','This user Is Blocked');

        }
          return $next($request);

    }







}
