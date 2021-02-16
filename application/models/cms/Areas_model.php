<?php

class Areas_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'areas'; # Replace these properties on children
    $this->upload_dir = 'areas'; # Replace these properties on children
    $this->per_page = 15;
  }

  public function all()
  {
    $this->squery(['area_name']); # pass array for columns to check like
    $this->paginate();
    $res = [];
    $this->db->order_by('area_name', 'asc');
    $data = $this->db->get('areas')->result();
    foreach ($data as $key => $value) {
      unset($value->password);
      $res[] = $value;
    }

    return $res;
  }

}
