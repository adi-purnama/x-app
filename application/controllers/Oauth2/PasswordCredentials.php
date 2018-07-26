<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PasswordCredentials extends CI_Controller {
    function __construct(){
        @session_start();
        parent::__construct();
        $this->load->library("Server", "server");
    }

    function index(){
        $this->server->password_credentials();
    }
}
