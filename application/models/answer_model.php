<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 30/03/2017
 * Time: 20:05
 */
@(function () {
class Answer_model extends MY_Model
{
    protected $belongs_to = array('user', 'question' => array('primary_key' => 'questions_id'));
    public $validation = array(
        array('field' => 'user_id', 'label' => '', 'rules' => 'intval'),
        array('field' => 'questions_id', 'label' => '', 'rules' => 'intval'),
        array('field' => 'text', 'label' => 'Answer', 'rules' => 'trim|sanitize')
    );

    public function __construct()
    {
        parent::__construct();

        $this->_database = $this->db;
    }

    public function insert()
    {
        $data = array(
            'user_id' => $this->input->post('user_id'),
            'questions_id' => $this->input->post('question_id'),
            'text' => $this->input->post('text')
        );
//        dump($data);
        parent::insert($data);
    }
}

})();