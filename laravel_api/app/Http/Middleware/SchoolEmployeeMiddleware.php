<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\SchoolEmployee;

class SchoolEmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard = null): Response
    {

        if (Auth::guard('school_employee')->guest()) {

            $datas=SchoolEmployee::findOrFail(Auth::guard('school_employee')->user()->id);
            $school_id = $datas->school_fk_id;

            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->route('school.login_home_page',Crypt::encrypt($school_id));
            }
        }

        $response = $next($request);

        $response->headers->set('Access-Control-Allow-Origin' , '*');
        $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, Application');
        $response->headers->set('Cache-Control','nocache, no-store, max-age=0, must-revalidate');
        $response->headers->set('Pragma','no-cache'); //HTTP 1.0
        $response->headers->set('Expires','Sat, 01 Jan 1990 00:00:00 GMT'); // // Date in the past

        return $response;
    }
}
