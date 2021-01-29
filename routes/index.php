<?php

  // Protect
  defined ('_ROOT') or die;


  /*
   *
   * Basic route
   *
   */
  $router->get ('/', function () use ($router) {
    return "PurpleDesk API " . _VERSION . " <small> - " . $router->app->version () . "</small>";
  });


  /*
   *
   * Load routes
   *
   */
  require 'auth.php';
  require 'user.php';
