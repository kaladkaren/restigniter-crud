<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';

class MY_Controller extends \Restserver\Libraries\REST_Controller
{
  # Just need to declare this but not needing it
  # I prefer more declarative class names than `MY_*`
}

class Admin_core_controller extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public function wrapper($body, $data = null)
  {
    if ($this->session->user_type !== 'Admin') {
      redirect('cms/login');
    }

    $this->load->view('cms/partials/header');
    $this->load->view('cms/partials/left-sidebar');
    $this->load->view($body, $data);
    $this->load->view('cms/partials/footer');
  }

  public function admin_redirect($param = null)
  {
    if ($this->session->user_type !== 'Admin') {
      redirect('cms/login');
    } else {
      redirect($param);
    }
  }
}

class Front_core_controller extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }

  public function wrapper($body, $data = null,  $sidebar = 'generic')
  {
    if ($this->session->user_type !== 'user') {
      redirect('login');
    }

    $this->load->view('front/partials/header');
    $this->load->view("front/partials/sidebar/{$sidebar}", $seller);
    $this->load->view($body, $data);
    $this->load->view('front/partials/footer');
  }

  public function front_redirect($param = null)
  {
    if ($this->session->user_type !== 'user') {
      redirect('login');
    } else {
      redirect($param);
    }
  }
}

class Crud_controller extends \Restserver\Libraries\REST_Controller
{

  function __construct()
  {
    parent::__construct();
    # Do not forget to load your model in your child class
    # $this->load->model('Example_model', 'model');
    # Do not change the 2nd parameter because we need a generic model name for this
  }

  function index_get()
  {
    $res = $this->model->all();
    $this->response($res, 200);
  }

  function single_get($id)
  {
    $res = $this->model->get($id);
    if($res || $res !== []){ # Respond with 404 when the resource is not found
      $this->response($res, 200);
    }else{
      $this->response(['message' => 'Not found'], 404);
    }
  }

  function index_post()
  {
    # NOTE: This is an example usage of batch upload
    // $data = array_merge($this->input->post(), $this->model->batch_upload($_FILES['input_name']));

    # NOTE: This is an example usage of single upload
    $data = array_merge($this->input->post(), $this->model->upload('image_url'));

    // $data = $this->input->post();

    if($last_id = $this->model->add($data)){ # Try to add and get the last id
      $res = $this->model->get($last_id); # Get the last entry data
      $this->response_header('Location', api_url($this) .  $last_id); # Set the header location
      $this->response($res, 201);
    }else{
      $this->response(['message' => 'Malformed syntax'], 400);
    }
  }

  /**
  * edit single
  * @param  int $id [description]
  */
  function single_post($id)
  {
    $data = array_merge($this->input->post(), $this->model->upload('image_url'));

    $res = $this->model->update($id, $data);

    if ($res || $res === 0) {
      $res = $this->model->get($id);
      $this->response_header('Location', api_url($this) .  $id); # Set the newly created object's location
      $this->response($res, 200);
    } elseif ($res === null) {
      $this->response(['message' => 'Not found'], 404);
    } else {
      $this->response(['message' => 'Malformed syntax'], 400);
    }
  }

  function single_delete($id)
  {
    $res = $this->model->delete($id);
    if($res > 0){
      $this->response($res, 204); # Omits the response anyway if 204
    }else{
      $this->response(['message' => 'Not found'], 404 );
    }
  }

}
