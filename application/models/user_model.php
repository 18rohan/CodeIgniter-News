<?php
	class User_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		

		public function create_user(){
				$data = array(
					'email' => $this->input->post('emailID'),
					'password' => md5($this->input->post('password2')),
					'user_title' => $this->input->post('user_title'),
				);
				// print_r($data);
				return $this->db->insert('users',$data);
				
		}

		public function auth_check($data){
			$query = $this->db->get_where('users',$data);
			if($query){
				return $query->row();
			}
			return false;
		}




	}