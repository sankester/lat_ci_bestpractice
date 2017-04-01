<?php
/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 13/03/2017
 * Time: 10:34
 */
class Users extends MY_Controller
{

    public function __construct(){
        parent::__construct();
    }

    public function login()
    {
//        echo "Login form";
//        $this->ion_auth->login('asankesterfire@gmail.com','sank3st3r');
//        $this->ion_auth->login('admin@admin.com','password');
//        dump($this->ion_auth->user()->row());

        $this->load->model('user_model');
        $questions = $this->user_model->with('questions')->with('answers')->get(1);
        dump($questions);
    }

    public function logout()
    {
        $this->ion_auth->logout();
    }
    public function register()
    {

    }

    public function data()
    {



    }
}