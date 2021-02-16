<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_admin_table extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
      ),
      'email' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
        'unique' => TRUE,
      ),
      'password' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
      ),
      'user_type' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
      ),
      'contact_num' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
      ),
      
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
    if($this->dbforge->create_table('admin'))
    {
      $table = 'admin';

      $data = array(
        'name' => 'Administrator',
        'email' => 'kmorales@myoptimind.com',
        'password' => password_hash('password', PASSWORD_DEFAULT),
        'user_type' => 'Admin',
        'contact_num' => '09068534696',
      );
      $this->db->insert($table, $data);
    }
  }

  public function down()
  {
    $this->dbforge->drop_table('admin', true);
  }
}
