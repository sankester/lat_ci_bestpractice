<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 13/03/2017
 * Time: 10:34
 */
class Users extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function login()
    {
//        echo "Login form";
//        $this->ion_auth->login('asankesterfire@gmail.com','sank3st3r');
//        $this->ion_auth->login('admin@admin.com','password');
//        dump($this->ion_auth->user()->row());

//        $this->load->model('user_model');
//        $questions = $this->user_model->with('questions')->with('answers')->get(1);
//        dump($questions);

        if ($this->ion_auth->logged_in() == true) {
            redirect('questions/listing');
        }

        $this->form_validation->set_rules($this->user_model->validation);

        if ($this->form_validation->run() == true) {
            if ($this->ion_auth->login($this->input->post('email'), $this->input->post('password')) == true) {
                redirect('questions/listing');
            }
        }

        $this->data['error'] = 'We could not log you in';

        $this->load_view('users/login');
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