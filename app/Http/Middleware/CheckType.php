<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use App\Http\Response\Resources\UserResource;
use App\Http\Response\Utility\ResponseType;
use Dev\Application\Utility\UserType;

class CheckType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if ($user->type == UserType::CLIENT || $user->type == UserType::ADMIN) {
                return $next($request);
            }
            else{
                Auth::logout(true);
                return new UserResource(ResponseType::simpleResponse(
                    ResponseType::userStatusResponseMessage($user->type), false));
            }
        }

        throw new AuthenticationException('Unauthenticated');
    }
}
