<?php

namespace App\Exceptions;

use Dev\Application\Exceptions\TimeExistException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException)
        {
            return response()->json(
                [
                    'data' => [],
                    'message' => 'Not Found', 
                    'success' => false
                ],
                404
            );
        }
        if ($exception instanceof MethodNotAllowedHttpException)
        {
            return response()->json(
                [
                    'data' => [],
                    'message' => 'Method Not Allowed', 
                    'success' => false,
                    'authorized' => false 
                ],
                404
            );
        }
        if ($exception instanceof AuthorizationException)
        {
            return response()->json(
                [
                    'data' => [],
                    'message' => 'This action is unauthorized', 
                    'success' => false,
                    'authorized' => false
                ],
                401
            );
        }
        if ($exception instanceof AuthenticationException)
        {
            return response()->json(
                [
                    'data' => [],
                    'message' => 'Unauthenticated', 
                    'success' => false,
                    'authorized' => false
                ],
                401
            );
        }
        return parent::render($request, $exception);
    }
}
