<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        date_default_timezone_set("Asia/Kolkata"); //Setting Indian Timezone

        $this->load->model('home_model');
        
	if (!$this->session->userdata('user_id'))
             header("Location:". base_url() ."index.php?/login");
    }

	public function index() {
                $user_id = $this->session->userdata('user_id');
		$profile_details = $this->home_model->get_profile_details($user_id); //print_r($profile_details);exit;
                $img_details = array();
                $img_details = $this->home_model->get_details($user_id);
                $tweet_cnt = count($img_details);
		$this->load->view('home/index',['upload_data'=>'', 'profile_details'=>$profile_details,'img_details'=>$img_details,'tweet_count'=>$tweet_cnt]);
    }
	
    public function tweet(){
        
        $post['user_id'] = $this->session->userdata('user_id'); 
        $post['tweet_desc'] = $this->input->post('tweet_text');
        $post['date'] = date('Y-m-d H:i:s');
        //$post['file_img'] = $this->input->post('userfile'); 
            
         $config['upload_path']   = './images/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 2048;  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('home/index', ['upload_data'=>$error]); 
         }else { 
             $data = $this->upload->data();
             $image_path = "images/" . $data['raw_name'] . $data['file_ext'];
             $post['image'] = $image_path; //User
         }     
         
         if ($this->home_model->add_tweet($post)) {
                    $this->session->set_flashdata('feedback', "Tweet uploaded successfully.!!!");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('home');
                } else {
                    $this->session->set_flashdata('feedback', "Image failed to add, Please try again");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                    return redirect('home');
                }
            $data = array('upload_data' => $this->upload->data()); 
            $img_details = $this->home_model->get_details();
            $this->load->view('home/index', ['upload_data'=>$data,'img_details'=>$img_details]);
        
    }
    
    
    public function update_tweet(){
        
        $tweet_id = $this->input->post('tweet_id'); 
        $post['tweet_desc'] = $this->input->post('tweet_text');
        
         $config['upload_path']   = './images/'; 
         $config['allowed_types'] = 'gif|jpg|png'; 
         $config['max_size']      = 2048;  
         $this->load->library('upload', $config);
			
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); //print_r($error['error']);exit;
                    $this->session->set_flashdata('feedback', $error['error']);
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                    return redirect('home');
         }else { 
             $data = $this->upload->data();
             $image_path = "images/" . $data['raw_name'] . $data['file_ext'];
             $post['image'] = $image_path; //User
         } 
         
         if ($this->home_model->update_tweet($tweet_id, $post)) {
                    $this->session->set_flashdata('feedback', "Tweet updated successfully.!!!");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('home');
                } else {
                    $this->session->set_flashdata('feedback', "Image failed to Update, Please try again");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                    return redirect('home');
                }
            
    }
	
    
    public function delete_tweet(){
        $tweet_id = $_GET['id'];
        
        if ($this->home_model->delete_tweet($tweet_id)) {
                    $this->session->set_flashdata('feedback', "Tweet deleted successfully.!!!");
                    $this->session->set_flashdata('feedback_class', 'alert-success');
                    return redirect('home');
                } else {
                    $this->session->set_flashdata('feedback', "Image failed to Update, Please try again");
                    $this->session->set_flashdata('feedback_class', 'alert-danger');
                    return redirect('home');
                }
    }
    
    public function profile(){
        
        $user_id = $this->session->userdata('user_id');
        $post = array();
        if($this->input->post('firstname') !=""){
            $post['firstname'] = $this->input->post('firstname');
        }
        if($this->input->post('lastname') !=""){
            $post['lastname'] = $this->input->post('lastname');
        }
        if($this->input->post('age')){
            $post['age'] = $this->input->post('age');
        }
        if($this->input->post('description') !=""){
            $post['description'] = $this->input->post('description');
        }
        if($this->input->post('userfile') !=""){
            $config['upload_path']   = './images/profile_images/'; 
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
            $config['max_size']      = 2048;  
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile')) {
               $error = array('error' => $this->upload->display_errors()); //print_r($error['error']);exit;
                   $this->session->set_flashdata('feedback', $error['error']);
                   $this->session->set_flashdata('feedback_class', 'alert-danger');
                   return redirect('home');

            }else { 
                $data = $this->upload->data();
                $image_path = "images/profile_images/" . $data['raw_name'] . $data['file_ext'];
                $post['profile_image'] = $image_path; //User
            }  
        }
          
           
         if ($this->home_model->update_profile($user_id, $post)) {
                $this->session->set_flashdata('feedback', "Profile updated successfully.!!!");
                $this->session->set_flashdata('feedback_class', 'alert-success');
                return redirect('home');
            } else {
                $this->session->set_flashdata('feedback', "Image failed to Update, Please try again");
                $this->session->set_flashdata('feedback_class', 'alert-danger');
                return redirect('home');
         }
        
    }
}
