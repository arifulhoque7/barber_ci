<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barber_con extends CI_Controller {

	public function index()
	{
		$this->load->view('barber');
	}
	public function send(){
		
		$to = $this->input->post('email');
		$name = $this->input->post('name');
		$subject = 'Thank you';
		$from = 'jibonahmed202020@gmail.com';
		$emailContent = "Thank you for your feedback";

    	$config = array(
    		'protocol' =>'smtp',
    		'smtp_host' => 'ssl://smtp.googlemail.com',
    		'smtp_port' => '465',
    		'smtp_user' => 'your gmail address',
    		'smtp_pass' => 'your gmail password',
    	);
    	$this->load->library('email',$config);
    	$this->email->from($from,'Aminur Rahman');
    	$this->email->to($to);
    	$this->email->subject($subject);
    	$this->email->message($emailContent);
    	$this->email->set_newline("\r\n");
    	$this->email->send();


    	if($this->email->send()){
    	$this->session->set_flashdata('msg',"Mail has been sent successfully");
    	$this->session->set_flashdata('msg_class','alert-success');
    	
    }
    return redirect('barber_con/index');
}
}

