<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Custom API exception
 */
trait ExceptionTrait
{
  function apiException($request, $e)
  {
    //Model not found exception
      if ($this->isModel($e)) {
        return $this->ModelResponse($e);
      }

    //Not found http exception
    if ($this->isHttp($e)) {
      return $this->HttpResponse($e);
    }
    return parent::render($request, $e);
}

  //is model exception
  public function isModel($e)
  {
    return $e instanceof ModelNotFoundException;
  }

  //is http exception
  public function isHttp($e)
  {
    return $e instanceof NotFoundHttpException;
  }

  //Model exception response
  public function ModelResponse($e)
  {
    return response()->json([
      'errors' => 'Model not found'
    ], 404); //404 return not found
  }

  //Http exception response
  public function HttpResponse($e)
  {
    return response()->json([
      'errors' => 'Incorrect route'
    ], 404); //404 return not found
  }
}
