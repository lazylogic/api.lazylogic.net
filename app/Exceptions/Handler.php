<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Exception\SuspiciousOperationException;
use Symfony\Component\HttpFoundation\Response as HTTP;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
     * @param  \Exception  $exception
     * @return void
     */
    public function report( Exception $exception )
    {
        parent::report( $exception );
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     * @param \Illuminate\Foundation\Exceptions\Handler
     */
    public function render( $request, Exception $exception )
    {
        if ( $request->expectsJson() || $request->segment( 1 ) == 'api' ) {
            return $this->responseJson( $exception );
        }

        return parent::render( $request, $exception );
    }

    protected function responseJson( Exception $e )
    {
        if ( $e instanceof NotFoundHttpException ) {
            $e = new HttpException( HTTP::HTTP_NOT_FOUND, $e->getMessage() ?: lang( 'exception.notfound' ), $e );
        } elseif ( $e instanceof TokenMismatchException ) {
            $e = new HttpException( 419, $e->getMessage(), $e );
        } elseif ( $e instanceof AuthenticationException ) {
            $e = new HttpException( HTTP::HTTP_UNAUTHORIZED, lang( 'auth.unauthorized' ), $e );
        }

        return Response::exception( $e );
    }

}