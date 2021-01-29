<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use Model;


class InpUserProvider implements UserProvider {


  /**
   *
   * Model
   *
   */
  protected $model;


  /**
   *
   * Create a new database user provider.
   *
   */
  public function __construct ($app, $model) {
    $this->model = $model;
  }


  /**
   *
   * Retrieve a user by their unique identifier.
   *
   * @param  mixed  $identifier
   * @return \Illuminate\Contracts\Auth\Authenticatable|null
   */
  public function retrieveById ($identifier) {
    return Model::Factory ('App\Models\User')
      ->find_one ($identifier);
  }


  /**
   *
   * Retrieve a user by their unique identifier and "remember me" token.
   *
   * @param  mixed  $identifier
   * @param  string  $token
   * @return \Illuminate\Contracts\Auth\Authenticatable|null
   */
  public function retrieveByToken ($identifier, $token) {
    return null;
  }


  /**
   *
   * Update the "remember me" token for the given user in storage.
   *
   * @param  \Illuminate\Contracts\Auth\Authenticatable|\Illuminate\Database\Eloquent\Model  $user
   * @param  string  $token
   * @return void
   */
  public function updateRememberToken(UserContract $user, $token) {
  }


  /**
   *
   * Retrieve a user by the given credentials.
   *
   * @param  array  $credentials
   * @return \Illuminate\Contracts\Auth\Authenticatable|null
   */
  public function retrieveByCredentials(array $credentials) {

    if (empty($credentials) ||
       (count($credentials) === 1 &&
      Str::contains($this->firstCredentialKey($credentials), 'password'))) {
      return;
    }

    if (! isset ($credentials['account']) || $credentials['account'] == '')
      return;

    return Model::Factory ('App\Models\User')
      ->where ('account', $credentials['account'])
      ->find_one ();
  }


  /**
   *
   * Get the first key from the credential array.
   *
   * @param  array  $credentials
   * @return string|null
   */
  protected function firstCredentialKey(array $credentials) {
    foreach ($credentials as $key => $value) {
      return $key;
    }
  }


  /**
   *
   * Validate a user against the given credentials.
   *
   * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
   * @param  array  $credentials
   * @return bool
   */
  public function validateCredentials(UserContract $user, array $credentials) {

    $plain = $credentials['password'];

    return password_verify ($plain . $_ENV['APP_SECRET'], $user->password);
  }
}
