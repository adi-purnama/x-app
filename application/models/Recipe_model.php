<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Recipe_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    function get_all_recipes(){
        // $this->db->limit();
        return $this->db->get('recipe');
    }
    function get_detail_recipe($recipe_id){
      $query = $this->db->get_where('recipe', array('id' => $recipe_id));
      return $query;
    }
    function insert_recipe($recipe_data){
        $this->db->insert('recipe', $recipe_data);
    }
    function update_recipe($recipe_id, $data){
      $this->db->set($data);
      $this->db->where('id', $recipe_id);
      $this->db->update('recipe');
    }
    public function delete_recipe($recipe_id)
    {
      $this->db->where('id', $recipe_id);
      $this->db->delete('recipe');
    }

}
