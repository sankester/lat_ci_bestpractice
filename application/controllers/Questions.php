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
        if(!$this->data['question'] = $this->zf_cache->load($cacheId)){
            $this->data['question'] = $this->question_model->with('user')->get($id);
            $this->zf_cache->save( $this->data['question'], $cacheId, array('all_questions'));
        }

        $cacheId = 'answers_'.$id;
        if(!$this->data['answers'] = $this->zf_cache->load($cacheId)){
            $this->db->where('questions_id', $id);
            $this->data['answers'] = $this->answer_model->with('user')->get_all();
            $this->zf_cache->save( $this->data['answers'], $cacheId, array('all_answers','all_questions'));
        }



        $this->form_validation->set_rules($this->answer_model->validation);
        $this->form_validation->run();
        if(count($_POST)){
            $this->answer_model->insert();
            $this->zf_cache->remove('answers_'.$id);
            redirect(current_url());
//            redirect($_SERVER['REQUEST_URI'], 'refresh');
        }

//        $this->zf_cache->clean(Zend_Cache::CLEANING_MODE_MATCHING_ANY_TAG,  array('all_questions'));

        $this->load_view('questions/detail');
    }

    public function listing()
    {

        $cacheId = 'listing';
        if(!$this->data['questions'] = $this->zf_cache->load($cacheId)){
            $this->data['questions'] = $this->question_model->get_with_users();

            $this->zf_cache->save( $this->data['questions'], $cacheId, array('all_questions'));
        }


        $this->load_view('questions/listing');

    }
}