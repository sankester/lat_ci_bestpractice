<?php

/**
 * Created by PhpStorm.
 * User: sankester
 * Date: 14/04/2017
 * Time: 21:11
 */
class Zf_cache
{
    public $lifetime = 1;
    public $enable = TRUE;
    public $automatic_serialization =  TRUE;
    private $_ci;
    private $_cache;

    public function __construct($options = array())
    {
        $this->_ci =& get_instance();

        $this->_ci->load->library('Zend');
        $this->_ci->zend->load('Zend/Cache', array('lifetime' => 900));

        !isset($options['lifetime']) || $this->lifetime = $options['lifetime'];
        !isset($options['enable']) || $this->enable = $options['enable'];
        !isset($options['automatic_serialization']) || $this->automatic_serialization = $options['automatic_serialization'];

        $this->_cache = Zend_Cache::factory('Core', 'File', array(
            'caching' => $this->enable,
            'lifetime' => $this->lifetime,
            'automatic_serialization' => $this->automatic_serialization
        ), array(
            'cache_dir' => APPPATH . 'cache'
        ));
    }

    public function get_instance()
    {
        return $this->_cache;
    }
}