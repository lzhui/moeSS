<?php
class Email_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function index() {

        $this->load->helper('form');
        $this->load->view('email_form');
    }

    public function send_mail() {
        $from_email = "921424330@qq.com";
        $to_email = $this->input->post('email');


        $config = array(
            'crlf'          => "\r\n",
            'newline'       => "\r\n",
            'charset'       => 'utf-8',
            'protocol'      => 'smtp',
            'mailtype'      => 'html',
            'smtp_host'     => 'ssl://smtp.qq.com',
            'smtp_port'     => '465',
            'smtp_user'     => '921424330@qq.com',
            'smtp_pass'     => 'cgwdrg273586'
        );
        //Load email library
        $this->load->library('email',$config);

        $this->email->from($from_email, '系统邮件');
        $this->email->to($to_email);
        $this->email->subject('邮件测试');
        $this->email->message('测试邮件类.');

        $result = $this->email->send();
        var_dump($result);

        //Send mail
        if($this->email->send())
            $this->session->set_flashdata("email_sent","Email sent successfully.");
        else
            $this->session->set_flashdata("email_sent","Error in sending Email.");
        $this->load->view('email_form');
    }
}
?>