<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 14/04/2017
 * Time: 22:29
 */
class Blog_m extends MY_Model
{
    public function get_posts()
    {
        return array(
            array('title' => 'First blog', 'text' => 'this is my text'),
            array('title' => 'Seconds  blog', 'text' => 'this is my text'),
            array('title' => 'Third blog', 'text' => 'this is my text')
        );
    }
}