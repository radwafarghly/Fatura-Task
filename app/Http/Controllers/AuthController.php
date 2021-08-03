<?php

namespace App\Http\Controllers;
use App\Http\Response\Resources\UserResource;
use App\Http\Requests\LoginFormRequest;
use App\Http\Response\Utility\ResponseType;
use Illuminate\Support\Facades\Auth;
use Dev\Application\Utility\UserType;
use Dev\Domain\Service\AuthService;


/**
 *
 */
class AuthController extends Controller
{
    /**
     *
     */
    // private $authService;

    

    /**
     *
     */
    public function __construct(AuthService $authService
    ) {
        $this->authService = $authService;

    }




    /**
     *Login function 

     */
    public function login(LoginFormRequest $request)
    {
        $credentials = $request->validated();
        if ($token = Auth::attempt($credentials)) {
            $authUser = auth()->user();
            return (new UserResource($authUser))
            ->additional(ResponseType::simpleResponse(trans('messages.user-login'), true, $this->respondWithToken($token)));    
        }
        return new UserResource(ResponseType::simpleResponse(trans('messages.invalid-login'), false));        
    }



     /**
     *
     */
    public function logout()
    {
        $this->guard()->logout();
        return (new UserResource([]))->additional(ResponseType::simpleResponse(trans('messages.user-logout'), true));        
    }



     /**
     * Refresh JWT token
     */
    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {

            $authUser = auth()->user();
            return (new UserResource($authUser))
            ->additional(ResponseType::simpleResponse(trans('messages.user-login'), true, $this->respondWithToken($token)));
        }
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 120
        ];
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }
    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return new UserResource($this->guard()->user());
    }
   
}