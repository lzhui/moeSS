<?php

/**
 * Created by PhpStorm.
 * User: lzhui
 * Date: 2016/10/25
 * Time: 15:28
 */
class Test extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        return;
    }

    public function index() {




        $username = 'wewrwerww';
        $res = $this->user_model->send_active_email($username);
        var_dump($res);


//        $this->load->view('test');
//        echo "Hello World!";
    }

}