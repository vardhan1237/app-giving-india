<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class AuthUser {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (Session::get('user_id') != '' && (Session::get('user_name') !='')) {
			return $next($request);
		} else {
			return redirect('/');
		}

	}
}
