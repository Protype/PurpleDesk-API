<?php

  namespace App\Http\Controllers;

  use Model;
  use Illuminate\Http\Request;


  /**
   *
   * System defines
   *
   */
  class UserController extends Controller {


    /**
     *
     * Create a new controller instance.
     *
     */
    public function __construct () {
    }


    /**
     *
     * Auth User
     *
     */
    public function auth (Request $request) {

      $data = $request->all ();

      $user = Model::Factory ('Model\User')
        ->where ('account', $data['account'])
        ->find_one ();

      if (! $user)
        return ['errors' => []];

      if (! password_verify ($data['password'] . $_ENV['APP_SECRET'], $user->password))
        return ['errors' => []];

      return [

        'meta' => [
        ],

        'data' => $user->as_array (),
      ];
    }


    /**
     *
     * Get User list
     *
     */
    public function list () {

      $users = Model::Factory ('Model\User')
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
