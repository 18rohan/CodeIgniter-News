<?php
	
 	class Users extends CI_controller {
 		public function index(){

 			$this->load->view("templates/header");
			$this->load->view('Users/login');
 			$this->load->view("templates/footer");
 		}


 		public function signin(){
 				$data['title'] = 'SIGN UP';

 			$this->form_validation->set_rules('emailID','email Address','required|is_unique[users.email]');
 			$this->form_validation->set_rules('password1','password','required');
 			$this->form_validation->set_rules('password2','Confirm Password','required');
 			$this->form_validation->set_rules('user_title','User Title','required');

 			if($this->form_validation->run() == FALSE){
 				$this->load->view('templates/header');
 				$this->load->view('Users/signin',$data);
 				$this->load->view('templates/footer');	
 			}else{
 				$this->user_model->create_user();
 				redirect('posts');
 			}	
 		
 	}
 	public function dashboard(){
 		
 		$this->load->view('templates/header');
 		$this->load->view('Users/dashboard');
 		$this->load->view('templates/footer');
 	}
 	public function login(){

 		$this->form_validation->set_rules('emailID','email Address','required');
 		$this->form_validation->set_rules('password','password','required');

// If the form_validation is not executed, user will be redirected to login page.
 		if($this->form_validation->run() == FALSE){
			$this->load->view("templates/header");
			$this->load->view('Users/login');
 			$this->load->view("templates/footer");
 		}
// If the form_validation is executed we will check the user input with the user data available in the database.
 		else{
 			$data = array(
 				'email'=>$this->input->post('emailID'),
 				'password'=>md5($this->input->post('password')),
 			);
 			// Checking user from the database
 			$check = $this->user_model->auth_check($data);

 			// If $check is true, then we will add the userdata to the session
 			if($check != false){
 				$user = array(
 					'user_id' => $check->user_id,
 					'email' => $check->email,
 					'user_title'=>$check->user_title,
 				);

 			// Storing the user data in the session data
 			$this->session->set_userdata($user);
 			$data['email'] = $_SESSION['email'];
 			// print_r($data['email']);
 			$this->load->view('templates/header');
 			$this->load->view('users/dashboard',$data);
 			$this->load->view('templates/footer');
 			}

 			// $this->load->view('templates/header');
 			// $this->load->view('users/login');
 			// $this->load->view('templates/footer');
 		}

 	}

 	public function logout(){
 		$this->session->sess_destroy();
 		redirect(base_url('home'));
 	}
 }
 