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
        $cacheId = 'question_'.$id;
        if(!$this->data['question'] = $this->cache->get($cacheId)){
            $this->data['question'] = $this->question_model->with('user')->get($id);
            $this->cache->save($cacheId, $this->data['question'], 900);
        }

        $cacheId = 'answers_'.$id;
        if(!$this->data['answers'] = $this->cache->get($cacheId)){
            $this->db->where('questions_id', $id);
            $this->data['answers'] = $this->answer_model->with('user')->get_all();
            $this->cache->save($cacheId, $this->data['answers'], 900);
        }



        $this->form_validation->set_rules($this->answer_model->validation);
        $this->form_validation->run();
        if(count($_POST)){
            $this->answer_model->insert();
            $this->cache->delete('answers_'.$id);
            redirect(current_url());
//            redirect($_SERVER['REQUEST_URI'], 'refresh');
        }

        $this->load_view('questions/detail');
    }

    public function listing()
    {

        $cacheId = 'listing';
        if(!$this->data['questions'] = $this->cache->get($cacheId)){
            $this->data['questions'] = $this->question_model->get_with_users();

            $this->cache->save($cacheId, $this->data['questions'], 900);
        }


        $this->load_view('questions/listing');

    }
}