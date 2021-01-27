<?php

use Phinx\Seed\AbstractSeed;

class UserTestData extends AbstractSeed {

  /**
   * Run Method.
   *
   * Write your database seeder using this method.
   *
   * More information on writing seeders is available here:
   * http://docs.phinx.org/en/latest/seeding.html
   */
  public function run () {

    $table = 'user';

    $this->execute ("TRUNCATE TABLE `$table`");

    $faker = Faker\Factory::create ('zh_TW');
    $enFaker = Faker\Factory::create ('en_US');

    $data = [];

    for ($i=0; $i<10; $i++) {

      $name = $enFaker->word;
      $password = password_hash ($name . $_ENV['APP_SECRET'], PASSWORD_BCRYPT, ["cost" => 10]);

      $data[] = [
        'email'         => $faker->email,
        'account'       => $name,
        'password'      => $password,
        'name'          => $enFaker->name,
        'status'        => $faker->randomElement ([_USER_STATUS_UNVERIFIED, _USER_STATUS_VERIFIED, _USER_STATUS_BLOCKED]),
        'last_login'    => $faker->date ('Y-m-d H:i:s'),
        'login_counter' => $faker->randomDigit,
        'login_ip'      => $faker->ipv4,
        'createdate'    => $faker->date ('Y-m-d H:i:s'),
        'updatedate'    => $faker->date ('Y-m-d H:i:s'),
        ];
    }

    $this->insert ($table, $data);
  }
}
