<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct(){
        parent::__construct();
        
        date_default_timezone_set("Asia/Kolkata");  //Setting Indian Timezone
        
        $this->load->model('login_model');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
	public function index()
	{   
		$this->load->view('login_page');
	}
        
        public function signup(){
            
            $data = array();
            $data['firstname'] = $this->input->post('firstname');
            $data['lastname'] = $this->input->post('lastname');
            $data['age'] = $this->input->post('age');
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $data['date'] = date('Y-m-d H:i:s');
            $data['status'] = 1;
            
            $inserted_id = $this->login_model->add_users($data);
            //print_r($inserted_id);exit;
            if($inserted_id != 0){
               
                $this->session->set_flashdata('feedback','You have signed up successfully');
                $this->session->set_flashdata('feedback_class','alert-success');
                
                header("Location:". base_url() ."index.php?/login");
            }else{
                $this->session->set_flashdata('feedback','Please try again, Something went wrong..!!');
                $this->session->set_flashdata('feedback_class','alert-danger'); 
                return redirect('index.php?/login');
            }
            
        }
        
        //For checking user email id already exists OR not
        public function email_already_exists(){
            $email = $this->input->post('email');
            
            $email_check = $this->login_model->already_exists_email($email);
            if($email_check != 0){
                $res = array('res'=>'Email already Exists', 'status'=>1);
                echo json_encode($res);
            }else{
                $res = array('res'=>'Valid', 'status'=>0);
                echo json_encode($res);
            }
            
        }
        
        
        public function signin(){
            
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            
            $user_details = $this->login_model->user_details($email,$password);
            //print_r($user_details);exit;
            
            if(empty($user_details)){
                $this->session->set_flashdata('feedback','Invalid Username or Password');
                $this->session->set_flashdata('feedback_class','alert-danger');

                header("Location:". base_url() ."index.php?/login");
            }else{
                $newdata = array(
                'user_id' => $user_details->id,
                'name' => $user_details->firstname.' '.$user_details->lastname,
                'username' => $user_details->firstname.''.$user_details->lastname,
                'email' => $user_details->email,
                'created_date' => $user_details->date );
                //set session here
                $this->session->set_userdata($newdata);
            
                return redirect('home/index');
            
            }
        }
        
        
        public function logout(){
            $this->session->unset_userdata('user_id');
            return redirect('login');
        }
        
        
        
}
