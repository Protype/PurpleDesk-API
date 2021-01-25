<?php


  if (! defined ('_ROOT')) {

    // Root
    define ('_ROOT', dirname (__DIR__));

    // Vendors
    require_once _ROOT . '/vendor/autoload.php';
  }

  // Load environment files
  Dotenv\Dotenv::createImmutable (_ROOT)->load ();

  // Config
  return [

    'paths' => [
      'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
      'seeds' => '%%PHINX_CONFIG_DIR%%/database/seeds'
    ],

    'environments' => [
      'default_migration_table' => 'phinxlog',
      'default_environment' => 'development',

      'production' => [
        'adapter' => isset ($_ENV['DB_PRODUCTION_ADAPTER']) ? $_ENV['DB_PRODUCTION_ADAPTER'] : $_ENV['DB_ADAPTER'],
        'host'    => isset ($_ENV['DB_PRODUCTION_HOST']) ? $_ENV['DB_PRODUCTION_HOST'] : $_ENV['DB_HOST'],
        'name'    => isset ($_ENV['DB_PRODUCTION_NAME']) ? $_ENV['DB_PRODUCTION_NAME'] : $_ENV['DB_NAME'],
        'user'    => isset ($_ENV['DB_PRODUCTION_USER']) ? $_ENV['DB_PRODUCTION_USER'] : $_ENV['DB_USER'],
        'pass'    => isset ($_ENV['DB_PRODUCTION_PASS']) ? $_ENV['DB_PRODUCTION_PASS'] : $_ENV['DB_PASS'],
        'port'    => isset ($_ENV['DB_PRODUCTION_PORT']) ? $_ENV['DB_PRODUCTION_PORT'] : $_ENV['DB_PORT'],
        'charset' => isset ($_ENV['DB_PRODUCTION_CHARSET']) ? $_ENV['DB_PRODUCTION_CHARSET'] : $_ENV['DB_CHARSET'],
      ],

      'development' => [
        'adapter' => isset ($_ENV['DB_DEVELOPMENT_ADAPTER']) ? $_ENV['DB_DEVELOPMENT_ADAPTER'] : $_ENV['DB_ADAPTER'],
        'host'    => isset ($_ENV['DB_DEVELOPMENT_HOST']) ? $_ENV['DB_DEVELOPMENT_HOST'] : $_ENV['DB_HOST'],
        'name'    => isset ($_ENV['DB_DEVELOPMENT_NAME']) ? $_ENV['DB_DEVELOPMENT_NAME'] : $_ENV['DB_NAME'],
        'user'    => isset ($_ENV['DB_DEVELOPMENT_USER']) ? $_ENV['DB_DEVELOPMENT_USER'] : $_ENV['DB_USER'],
        'pass'    => isset ($_ENV['DB_DEVELOPMENT_PASS']) ? $_ENV['DB_DEVELOPMENT_PASS'] : $_ENV['DB_PASS'],
        'port'    => isset ($_ENV['DB_DEVELOPMENT_PORT']) ? $_ENV['DB_DEVELOPMENT_PORT'] : $_ENV['DB_PORT'],
        'charset' => isset ($_ENV['DB_DEVELOPMENT_CHARSET']) ? $_ENV['DB_DEVELOPMENT_CHARSET'] : $_ENV['DB_CHARSET'],
      ],

      'testing' => [
        'adapter' => isset ($_ENV['DB_TESTING_ADAPTER']) ? $_ENV['DB_TESTING_ADAPTER'] : $_ENV['DB_ADAPTER'],
        'host'    => isset ($_ENV['DB_TESTING_HOST']) ? $_ENV['DB_TESTING_HOST'] : $_ENV['DB_HOST'],
        'name'    => isset ($_ENV['DB_TESTING_NAME']) ? $_ENV['DB_TESTING_NAME'] : $_ENV['DB_NAME'],
        'user'    => isset ($_ENV['DB_TESTING_USER']) ? $_ENV['DB_TESTING_USER'] : $_ENV['DB_USER'],
        'pass'    => isset ($_ENV['DB_TESTING_PASS']) ? $_ENV['DB_TESTING_PASS'] : $_ENV['DB_PASS'],
        'port'    => isset ($_ENV['DB_TESTING_PORT']) ? $_ENV['DB_TESTING_PORT'] : $_ENV['DB_PORT'],
        'charset' => isset ($_ENV['DB_TESTING_CHARSET']) ? $_ENV['DB_TESTING_CHARSET'] : $_ENV['DB_CHARSET'],
      ]
    ],
    'version_order' => 'creation'
  ];
