<?php

class Admin_model extends Admin_core_model
{

  function __construct()
  {
    parent::__construct();

    $this->table = 'admin'; # Replace these properties on children
    $this->upload_dir = 'admin'; # Replace these properties on children
    $this->per_page = 15;
  }

  public function all()
  {
    $this->squery(['name']); # pass array for columns to check like
    $this->paginate();
    $res = [];
    $this->db->order_by('id', 'desc');
    $data = $this->db->get($this->table)->result();
    foreach ($data as $key => $value) {
      unset($value->password);
      $res[] = $value;
    }

    return $res;
  }

  public function add($data)
  {
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $this->db->insert($this->table, $data);
    return $this->db->insert_id();
  }

  public function update($id, $data)
  {
    if (!$data['password']) {
      unset($data['password']);
    } else {
      $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    }
    $this->db->where('id', $id);
    return $this->db->update($this->table, $data);
  }

  public function delete($id)
  {
  	// softdelete
    $this->db->where('id', $id);
    return $this->db->update($this->table, ['deleted_at' => date('Y-m-d H:i:s')]);
  }

}
