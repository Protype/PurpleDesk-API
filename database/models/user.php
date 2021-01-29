<?php

  namespace App\Models;

  use Tymon\JWTAuth\Contracts\JWTSubject;
  use Illuminate\Notifications\Notifiable;
  use Illuminate\Contracts\Auth\Authenticatable;


  /*
   *
   * User model
   *
   */
  class User extends \Model implements Authenticatable, JWTSubject {


    /**
     *
     * Get the name of the unique identifier for the user.
     *
     */
    public static $_table     = 'user';
    public static $_id_column = 'id';


    /**
     *
     * Get the name of the unique identifier for the user.
     *
     */
    public function getAuthIdentifierName () {
      return self::$_id_column;
    }


    /**
     *
     * Get the unique identifier for the user.
     *
     */
    public function getAuthIdentifier () {
      return $this->{self::$_id_column};
    }


    /**
     *
     * Get the password for the user.
     *
     */
    public function getAuthPassword () {
      return $this->password;
    }


    /**
     *
     * Get the token value for the "remember me" session.
     *
     */
    public function getRememberToken () {
      return null;
    }


    /**
     *
     * Set the token value for the "remember me" session.
     *
     */
    public function setRememberToken ($value) {
    }


    /**
     *
     * Get the column name for the "remember me" token.
     *
     */
    public function getRememberTokenName () {
      return '';
    }


    /**
     *
     *
     *
     */
    public function getJWTIdentifier () {
      return $this->getAuthIdentifier ();
    }


    /**
     *
     *
     *
     */
    public function getJWTCustomClaims () {
      return [];
    }
  }
