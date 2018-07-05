<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
计算控制器，类名首字母必须大写，所有的控制器必须继承自CI_Controller类
*/
class Blog extends CI_Controller
{

   // 构造方法
function __construct(){
                              parent::__construct();
   }

   // 默认方法
    // example.com/index.php/Blog/index/
    public function index()
    {
        echo "Hello CCcat!";
    }

    // example.com/index.php/Blog/comments/
    public function comments()
    {
        echo 'Look at this!';
    }

    // example.com/index.php/Blog/shoes/sandals/123
    // public function shoes($sandals, $id)
    // {
    //     echo $sandals;
    //     echo $id;
    // }

    // public function _remap($method, $params = array())
    // {
    //     $method = 'process_'.$method;
    //     if (method_exists($this, $method)) {
    //         return call_user_func_array(array($this, $method), $params);
    //     }
    //     show_404();
    // }

    // public function _output($output)
    // {
    //     if ($this->output->cache_expiration > 0) {
    //         $this->output->_write_cache($output);
    //     }
    //     echo $output;
    // }


    /*
    有时候你可能希望某些方法不能被公开访问，要实现这点，只要简单的将方法声明为 private 或 protected ， 这样这个方法就不能被 URL 访问到了。
    在方法名前加上一个下划线前缀也可以让该方法无法访问。
    */
    // example.com/index.php/Blog/_utility/    该网址不能被访问
    // private function _utility()
    {
        // some code
    }
}
