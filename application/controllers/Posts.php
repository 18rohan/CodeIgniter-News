<?php
 	class Posts extends CI_controller {
 		public function index(){
 			$config = array();
 			$config['base_url'] = base_url()."posts";
 			$config['total_rows'] = $this->post_model->get_count();
 			// print_r($config['total_rows']);die;
 			$config['per_page'] = 2;
 			$config['uri_segment'] = 3;
 			$config['use_page_numbers'] = TRUE;
 			$config['first_link'] = 'First';
 			$config['last_link'] = 'Last';


//Initializing pagination 
 			$this->pagination->initialize($config);
 			// $page = ($this->uri->segment(2) ? $this->uri->segment(2) : 0);
// Creating pagination links
 			$data['links'] = $this->pagination->create_links();
 			$data['Posts'] = $this->post_model->get_posts();
			$data['title'] = 'Latest Posts';
 			
 			// print_r($data['Posts']);

 			$this->load->view("templates/header");
 			$this->load->view('posts/index',$data);
 			$this->load->view("templates/footer");
 		}
 		public function create(){
 			$data['title'] = 'Create posts';

 			$this->form_validation->set_rules('title','Title','required');
 			$this->form_validation->set_rules('body','Body','required');

 			if($this->form_validation->run() == FALSE){
 				$this->load->view('templates/header');
 				$this->load->view('posts/create',$data);
 				$this->load->view('templates/footer');	
 			}else{
 				$this->post_model->create_post();
 				redirect('posts');
 			}
 			
 		}

 		public function view($slug = NULL){
 			$data['post'] = $this->post_model->get_posts($slug);
 			if(empty($data['post'])){
 				show_404();
 			}
 			$data['title'] = $data['post']['title'];

 			$this->load->view("templates/header");
 			$this->load->view('posts/view',$data);
 			$this->load->view("templates/footer");
 		}

 		public function delete($id){
 			$this->post_model->delete_post($id);
 			redirect("posts");
 		}
 		public function edit(){
 			$this->post_model->update_post();
 			// redirect("posts");
 		}
 	}
 