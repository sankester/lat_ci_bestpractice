<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 13/03/2017
 * Time: 10:34
 */

class Users extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function login()
    {
        echo "Login form";
        var_dump($this->ion_auth->user()->row());
    }

    public function register()
    {

    }
}