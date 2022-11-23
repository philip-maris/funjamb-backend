<?php

namespace App\Http\Middleware;

use App\Models\V1\Customer;
use App\Util\BaseUtil\ResponseUtil;
use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    use ResponseUtil;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request, Closure $next)
    {


        if (!is_null($request->user()->isAdmin)){
            return $next($request);
        }

       return $this->ERROR_RESPONSE("you are not a staff or an admin");
    }
}
