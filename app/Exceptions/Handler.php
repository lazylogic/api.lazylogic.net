<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Response;

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
        if ( $e instanceof AuthenticationException ) {
            return Response::unauthorized( lang( 'auth.unauthorized' ) );
        }

        return Response::exception( $e );
    }

}