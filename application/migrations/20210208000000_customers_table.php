<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_customers_table extends CI_Migration {

  public function up()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
      ),
      'company_name' => array(
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
      'customer_type' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
      ),
      'contact_num' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
      ),
      'address' => array(
        'type' => 'TEXT',
      ),
      'is_subscribe' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'is_active' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'is_suspended' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'total_points' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'status' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
      ),
      'remarks' => array(
        'type' => 'TEXT',
      ),
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
    if($this->dbforge->create_table('customers'))
    {
      $table = 'customers';

      $data = array(
        'name' => 'Fatima Waden',
        'company_name' => '',
        'email' => 'kmorales@myoptimind.com',
        'password' => password_hash('password', PASSWORD_DEFAULT),
        'customer_type' => 'Household',
        'contact_num' => '09068534696',
        'address' => 'Taytay, Rizal',
        'is_subscribe' => '1',
        'is_active' => '1',
        'is_suspended' => '0',
        'total_points' => '0',
        'status' => 'Accepted',
        'remarks' => '',

      );
      $this->db->insert($table, $data);
    }
  }

  public function down()
  {
    $this->dbforge->drop_table('customers', true);
  }
}
