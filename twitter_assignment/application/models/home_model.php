<?php

class Home_Model extends CI_Model {

    //Insert Signup User Data
    public function add_tweet($data){ 
      $this->db->insert('tweets', $data);
      return $this->db->affected_rows(); 
    }
    
    public function get_profile_details($user_id){
        $sql = "SELECT * FROM `users` WHERE id= '$user_id'";
        $query = $this->db->query($sql);
        return $query->row();
    }
    
    public function update_profile($user_id,$data){
        return $this->db
                    ->where('id',$user_id)
                    ->update('users',$data);
    }
    
    public function get_details($user_id){
        $sql = $this->db->query("SELECT * FROM `tweets` WHERE user_id = '$user_id' ");
        return $sql->result();
    }
    
    public function update_tweet($tweet_id,$data){
        return $this->db
                    ->where('id',$tweet_id)
                    ->update('tweets',$data);
    }
    
    public function delete_tweet($tweet_id){
        return $this->db
                    ->where('id',$tweet_id)
                    ->delete('tweets');
    }
        
}
