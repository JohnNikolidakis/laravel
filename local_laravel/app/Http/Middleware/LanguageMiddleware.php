<?php

namespace App\Http\Middleware\LanguageMiddleware;

use Closure;

class LanguageMiddleware
{
	public function __construct(Application $app, Request $request) {
        $this->app = $app;
        $this->request = $request;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
		$locale = $request->cookie('locale');
		App::setlocale($locale);
		return $next($request);
    }
}
