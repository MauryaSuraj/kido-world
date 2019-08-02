<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminMiddleware
{
   protected $auth;

   public function __construct(Guard $auth)
   {
       $this->auth = $auth;
   }

    public function handle($request, Closure $next)
    {
        if ($this->auth->getUser()->type !=="admin" ){
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
