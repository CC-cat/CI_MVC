<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
    public function index()
    {
        echo "Hello World!";
    }

    public function comments()
    {
        echo "Look at this!";
    }

    public function shoes($sandals, $id)
    {
        echo $sandals;
        echo $id;
    }

    public function _remap($method)
    {
        if ($method === 'some_methos') {
            $this->$method();
        } else {
            $this->default_method();
        }
    }

    public function _remap($method, $params = array())
    {
        $method = 'process_'.$method;
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this,$method), $params);
        }
        show_404();
    }
}
