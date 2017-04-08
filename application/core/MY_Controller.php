<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 17/03/2017
 * Time: 20:05
 */

use Netcarver\Textile;

class MY_Controller extends CI_Controller
{
    public $data = array();
    public function __construct()
    {
        parent::__construct();
        $no_redirect = array('users/login');
//        $accsessible_admin = array('users/register','questions/add');
        if ($this->ion_auth->logged_in() == false && !in_array(uri_string(), $no_redirect)) {
            redirect('users/login');
        }

        $this->output->enable_profiler(ENVIRONMENT == 'development');

//        else {
//            $group = 'admin';
////            if (!$this->ion_auth->in_group($group)) {
//            if (!$this->ion_auth->is_admin()) {
//                $this->data['users'] = $this->ion_auth->users()->result();
//                foreach ($this->data['users'] as $k => $user)
//                {
//                    $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
//                }
//
//                dump($this->data['users']);
//                if(in_array(uri_string(), $accsessible_admin)){
//                    dump("you don`t have access");
//                }
//            }else{
//                $this->data['users'] = $this->ion_auth->users()->result();
//                foreach ($this->data['users'] as $k => $user)
//                {
//                    $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
//                }
//            }

//        }

        $this->parser = new Textile\Parser();
    }

    public function load_view($subview)
    {
        $this->data['subview'] = $subview;
        $this->load->view('layouts/layout', $this->data);
    }
}