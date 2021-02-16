<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rewards extends Admin_core_controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('cms/rewards_model');
  }

  public function index()
  {
    $res = $this->rewards_model->all();

    $data['res'] = $res;
    $this->wrapper('cms/rewards', $data);
  }

  public function request()
  {
    $res = $this->rewards_model->request();

    $data['res'] = $res;
    $this->wrapper('cms/request', $data);
  }

}
