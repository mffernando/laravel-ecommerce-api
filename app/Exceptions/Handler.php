<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
      //Model not found exception
      if ($request->expectsJson()) {
        if ($exception instanceof ModelNotFoundException) {
          return response()->json([
            'errors' => 'Model not found'
          ], 404); //404 return not found
        }
      }

      //Not found http exception
      if ($exception instanceof NotFoundHttpException) {
        return response()->json([
          'errors' => 'Incorrect route'
        ], 404); //404 return not found
      }

      dd($exception);

        return parent::render($request, $exception);
    }
}
