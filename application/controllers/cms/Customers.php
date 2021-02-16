<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/customers_model');
  }

  public function index()
  {
    $res = $this->customers_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/customers', $data);
  }

  public function create()
  {
    $this->wrapper('cms/customers_create');
  }

  public function cancelled_accounts()
  {
    $res = $this->customers_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/cancelled_accounts', $data);
  }


}
