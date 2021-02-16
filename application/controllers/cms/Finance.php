<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/reports_model');
  }

  public function index()
  {
    $res = $this->reports_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/finance', $data);
  }

}
