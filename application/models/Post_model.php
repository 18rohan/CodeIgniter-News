<?php
	class Post_model extends CI_Model{

		protected $table = 'news';

		public function __construct(){
			$this->load->database();
		}
		public function get_posts($slug = FALSE){
			if($slug ==FALSE){
				$query = $this->db->get('news');
				return $query->result_array();
			}
			$query = $this->db->get_where('news', array('slug'=>$slug));
			return $query->row_array();
		}

		public function create_post(){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title'=> $this->input->post('title'),
				'slug'=>$slug,
				'text' => $this->input->post('body'),
			);
			return $this->db->insert('news', $data);
		}
		public function get_count() {
        return $this->db->count_all($this->table);
    	}

		public function delete_post($id){
			$this->db->where('id',$id);
			$this->db->delete('news');
			return true;
		}
		public function update_post(){
			$slug = url_title($this->input->post('title'));
			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('body')

			);
			$this->db->where('id',$this->input->post('id'));	
			return $this->db->update('news', $data);
		}
	}