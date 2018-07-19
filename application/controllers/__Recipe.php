<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('Recipe_model');
  }

  public function recipes()
  {
    switch ($this->input->method()) {
      case 'post':
        $request_data = json_decode($this->security->xss_clean($this->input->raw_input_stream));
        $recipe['id'] = md5(str_replace(" ","",date("Y-m-d-H-i-s-u")));
        $recipe['name'] = $request_data->name;
        $recipe['description'] = $request_data->description;

        // run query
        $this->Recipe_model->insert_recipe($recipe);
        // get result by id
        $response_data = $this->Recipe_model->get_detail_recipe($recipe['id'])->row();

        break;

      case 'get':
        // run query
        $response_data = $this->Recipe_model->get_all_recipes()->result();
        break;

      default:
        $response_data = array('message'=>'method not allowed');
        break;
    }
    $this->output->
    set_content_type('application/json')->
    set_output(json_encode($response_data));
  }

  public function recipe($recipe_id)
  {
    switch ($this->input->method()) {
      case 'get':
        // run query
        $response_data = $this->Recipe_model->get_detail_recipe($recipe_id)->row();
        break;

      case 'delete':
        // run query
        $this->Recipe_model->delete_recipe($recipe_id);
        $response_data = array('message'=>'recipe deleted');
        break;

      default:
        $response_data = array('message'=>'method not allowed');
        break;
    }
    $this->output->
    set_content_type('application/json')->
    set_output(json_encode($response_data));
  }


}
