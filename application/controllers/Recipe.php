<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Recipe_model');
  }
  function index($recipe_id=''){
    switch ($this->input->method()) {
      case 'get':
        if($recipe_id==''){
          // run query
          $response_data = $this->Recipe_model->get_all_recipes()->result(); // not use limit for a while
        } elseif(!$recipe_id=='') {
          // run query
          $response_data = $this->Recipe_model->get_detail_recipe($recipe_id)->row();
          break;
        }
        break;

      case 'post':
        $request_data = json_decode($this->security->xss_clean($this->input->raw_input_stream));

        $recipe['id'] = md5(str_replace(" ","",date("Y-m-d-H-i-s-u"))); // will create in helper

        $recipe['name'] = $request_data->name;
        $recipe['description'] = $request_data->description;

        // run query
        $this->Recipe_model->insert_recipe($recipe);
        // get result by id
        $response_data = $this->Recipe_model->get_detail_recipe($recipe['id'])->row();
        break;

      case 'put':
        $request_data = json_decode($this->security->xss_clean($this->input->raw_input_stream));

        $recipe = array();
        if(isset($request_data->name)){
          $recipe['name'] = $request_data->name;
        }
        elseif(isset($request_data->description)){
          $recipe['description'] = $request_data->description;
        }
        if(count($recipe)>0){
          // run update query
          $this->Recipe_model->update_recipe($recipe_id, $recipe);
          // get response
          $response_data = $this->Recipe_model->get_detail_recipe($recipe_id)->row();
        } else {
          $response_data = array("message"=>"missing something!");
        }
        break;

      case 'delete':
        // run query
        $this->Recipe_model->delete_recipe($recipe_id);
        $response_data = array('message'=>'recipe '.$recipe_id.' deleted');
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
