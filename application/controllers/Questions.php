<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 13/03/2017
 * Time: 17:41
 */
class Questions extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('question_model');
        $this->load->model('answer_model');
    }

    public function add()
    {

    }

    public function detail($id)
    {
        $this->data['question'] = $this->question_model->with('user')->get($id);
        $this->db->where('questions_id', $id);
        $this->data['answers'] = $this->answer_model->with('user')->get_all();

        $this->load_view('questions/detail');
    }

    public function listing()
    {
        $this->data['questions'] = $this->question_model->get_with_users();

        $this->load_view('questions/listing');

    }
}