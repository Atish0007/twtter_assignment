<?php

class Login_Model extends CI_Model {

    //Insert Signup User Data
    public function add_users($data){ 
      $this->db->insert('users', $data);
      return $this->db->insert_id(); 
    }
    
    //Check Already User
    public function already_exists_email($email) {
        $q = $this->db->where(['email' => $email , 'status' => 1])
                ->get('users');
        if ($q->num_rows()) {
            return $q->row()->id;
        } else {
            return FALSE;
        }
    }

    
    public function user_details($email,$password){
        $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password' ";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
        
}
