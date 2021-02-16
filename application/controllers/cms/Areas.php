<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/areas_model');
  }

  public function index()
  {
    $res = $this->areas_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/areas', $data);
  }

}
