<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 05/04/2017
 * Time: 07:38
 */
class My_Form_validation extends CI_Form_validation
{
    public function __construct(){
        parent::__construct();

    }

    public function sanitize($string)
    {
        return textile_sanitize($string);
    }
}