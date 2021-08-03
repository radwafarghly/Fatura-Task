<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;
use Dev\Application\Utility\UserStatus;
use App\Http\Response\Resources\UserResource;
use App\Http\Response\Utility\ResponseType;

/**
 *
 */
class Active
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if ($user->status !== UserStatus::ACTIVE) {
                Auth::logout(true);
                return new UserResource(ResponseType::simpleResponse(
                    ResponseType::userStatusResponseMessage($user->status), false));
            }
            return $next($request);
        }

        throw new AuthenticationException('Unauthenticated');
    }
}