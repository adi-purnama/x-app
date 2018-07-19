<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
  public function index(){
    switch ($this->input->method()) {
      case 'post':
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream));
        break;
      default:
        $data = array('message'=>'method not allowed');
        break;
    }

    $this->output->
    set_content_type('application/json')->
    set_output(json_encode($data));

  }
}
?>
