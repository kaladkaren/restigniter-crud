<?php

class Finance_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'customers'; # Replace these properties on children
    $this->upload_dir = 'customers'; # Replace these properties on children
    $this->per_page = 15;
  }

  public function all()
  {
    $this->squery(['name']); # pass array for columns to check like
    $this->paginate();
    $res = [];
    $this->db->order_by('id', 'desc');
    $data = $this->db->get('customers')->result();
    foreach ($data as $key => $value) {
      unset($value->password);
      $res[] = $value;
    }

    return $res;
  }

}
