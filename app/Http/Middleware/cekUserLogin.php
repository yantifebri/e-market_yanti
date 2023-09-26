<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class cekUserLogin
{
    public function handle(Request $request, Closure $next, $rules)
    {
       $User = Auth::user();

       if(!Auth::check()){
        return redirect('login');
       }
       if($User->level == $rules)
       return $next($request);
       
       return redirect('login')->with('error','you have no privildge');

    }
}
