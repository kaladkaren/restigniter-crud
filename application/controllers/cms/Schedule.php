<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/schedule_model');
  }

  public function index()
  {
    $res = $this->schedule_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/schedule', $data);
  }

}
