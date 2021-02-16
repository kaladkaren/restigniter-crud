<?php

class Rewards_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'rewards'; # Replace these properties on children
    $this->upload_dir = 'rewards'; # Replace these properties on children
    $this->per_page = 15;
  }

  public function all()
  {
    $this->squery(['name']); # pass array for columns to check like
    $this->paginate();
    $res = [];
    $this->db->order_by('id', 'asc');
    $data = $this->db->get('rewards')->result();
    foreach ($data as $key => $value) {
      unset($value->password);
      $res[] = $value;
    }

    return $res;
  }
  
  public function request()
  {
    $this->squery(['name']); # pass array for columns to check like
    $this->paginate();
    $res = [];
    $this->db->order_by('id', 'asc');
    $data = $this->db->get('customers')->result();
    foreach ($data as $key => $value) {
      unset($value->password);
      $res[] = $value;
    }

    return $res;
  }

}
