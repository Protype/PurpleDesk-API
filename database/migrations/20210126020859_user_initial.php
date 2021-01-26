<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

final class UserInitial extends AbstractMigration {

  public function change (): void {

    // User

    $this->table ('user', ['id' => FALSE, 'primary_key' => 'id', 'comment' => '使用者'])
      ->addColumn ('id', 'integer', ['limit' => MysqlAdapter::INT_BIG, 'signed' => FALSE, 'identity' => TRUE])

      // Basic fields
      ->addColumn ('email', 'char', ['limit' => 128, 'comment' => '信箱'])
      ->addColumn ('account', 'char', ['limit' => 64, 'comment' => '帳號'])
      ->addColumn ('password', 'char', ['limit' => 64, 'comment' => '密碼'])

      ->addColumn ('name', 'char', ['null' => TRUE, 'limit' => 32, 'comment' => '名稱'])
      ->addColumn ('status', 'integer', ['limit' => MysqlAdapter::INT_TINY, 'signed' => FALSE, 'default' => 0, 'comment' => '狀態'])

      // Record fields
      ->addColumn ('last_login',  'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '最後登入'])
      ->addColumn ('login_counter', 'integer', ['limit' => MysqlAdapter::INT_BIG, 'signed' => FALSE, 'default' => 1, 'comment' => '登入次數'])
      ->addColumn ('login_ip', 'char', ['limit' => 16, 'signed' => FALSE, 'comment' => '登入位置'])

      ->addColumn ('createdate', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'comment' => '建立日期'])
      ->addColumn ('updatedate', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP', 'comment' => '更新日期'])
      ->addColumn ('deletedate', 'timestamp', ['null' => TRUE, 'comment' => '刪除日期'])

      // Keys
      ->addIndex ('account')
      ->addIndex ('email')

      // Mutiple combined keys
      ->create ();
  }
}
