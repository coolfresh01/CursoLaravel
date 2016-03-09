<?php namespace Curso\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class IsAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
        private $auth;
    
        public function __construct(Guard $auth) {
            $this->auth = $auth;
        }
        
	public function handle($request, Closure $next) {
            
            //dd($this->auth->user());
            
            if (!$this->auth->user()->isAdmin()) {
                
                $this->auth->logout();
                
                if ($request->ajax()) {
                        return response('Unauthorized.', 401);
                    }
                    else {
                        //return redirect()->guest('auth/login');
                        return redirect()->to('auth/login');
                    }
            }
            
            return $next($request);
	}

}
