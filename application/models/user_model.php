<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 30/03/2017
 * Time: 20:05
 */
class User_model extends MY_Model
{

    public $validation = array(
        array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'required|valid_email|trim'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required|trim'
        )
    );
    protected $has_many = array('questions', 'answers');

    public function __construct()
    {
        parent::__construct();

        $this->_database = $this->db;
    }


}