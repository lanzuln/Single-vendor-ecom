<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
   protected $auth;
   protected $routh;
   public function __construct(Guard $auth, Route $route){
    $this->auth = $auth;
    $this->routh = $route;
   }
    public function handle(Request $request, Closure $next): Response
    {
        if($this->auth->user()->is_system_admin != 1){
            return new Response ('<h2 style="margin:160px 0px; color:red text-align:center">ACCESS DESIED</h2>',401);

        }
        return $next($request);
    }
}
