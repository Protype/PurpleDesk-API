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
  class UserController extends Controller {


    /**
     *
     * Get User list
     *
     */
    public function list () {

      $users = Model::Factory ('Model\User')
        ->order_by_desc ('id')
        ->find_array ();

      return [

        'meta' => [
          'total' => count ($users),
        ],

        'data' => $users,

        /*
        'links' => [
          'first' => '',
          'prev'  => '',
          'self'  => '',
          'next'  => '',
          'last'  => '',
        ]
        */
      ];
    }
  }
