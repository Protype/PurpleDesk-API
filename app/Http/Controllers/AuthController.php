<?php

  namespace App\Http\Controllers;

  use Model;

  use Illuminate\Http\Request;
  use Illuminate\Http\Response;
  use Illuminate\Http\JsonResponse;
  use Tymon\JWTAuth\Facades\JWTAuth;
  use App\Http\Controllers\Controller;
  use Tymon\JWTAuth\Exceptions\JWTException;
  use Illuminate\Validation\ValidationException;
  use Illuminate\Http\Exception\HttpResponseException;

  /**
   *
   * System defines
   *
   */
  class AuthController extends Controller {


    /**
     *
     * User login
     *
     */
    public function login (Request $request) {
    }
  }
