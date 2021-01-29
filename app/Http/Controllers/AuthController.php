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
     * Post login
     *
     */
    public function login (Request $request) {

      $credentials = $request->only (['account', 'password']);

      if (! $token = auth ()->attempt ($credentials))
        return response()->json(['error' => 'Unauthorized'], 401);

      return $this->respondWithToken ($token);
    }


    /**
     *
     * Post login
     *
     */
    public function respondWithToken ($token) {

      return response ()->json ([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth ()->factory ()->getTTL () * 60
      ]);
    }
  }
