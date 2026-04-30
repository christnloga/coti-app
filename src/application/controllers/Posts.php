<?php
	class Posts extends CI_Controller{
		public function index($offset = 0){	
			// Pagination Config	
			$config['base_url'] = base_url() . 'blog/index/';
			$config['total_rows'] = $this->db->count_all('posts');
			$config['per_page'] = 15;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link'); 

			// Init Pagination
			$this->pagination->initialize($config);

			$data['title'] = 'Latest Posts';

			$data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

			$data['categories'] = $this->post_model->get_categories();

			$this->load->view('template/header');
			$this->load->view('blog/index', $data);
			$this->load->view('template/footer');
		}

		public function view($slug = NULL){
			$data['post'] = $this->post_model->get_posts($slug);
			$post_id = $data['post']['post_id'];
			$data['comments'] = $this->comment_model->get_comments($post_id);
			$data['user'] = $this->user_model->get_user();	

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = $data['post']['title'];

			$this->load->view('template/header');
			$this->load->view('blog/sinle', $data);
			$this->load->view('template/footer');
		}

		public function create(){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}

			$data['title'] = 'Create Post';

			$data['categories'] = $this->post_model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('template/header');
				$this->load->view('blog/create', $data);
				$this->load->view('template/footer');
			} else {
				// Upload Image
				$config['upload_path'] = './assets/images/posts';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['max_width'] = '2000';
				$config['max_height'] = '2000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()){
					$errors = array('error' => $this->upload->display_errors());
					$post_image = 'noimage.jpg';
				} else {
					$data = array('upload_data' => $this->upload->data());
					$post_image = $_FILES['userfile']['name'];
				}

				$this->post_model->create_post($post_image);

				// Set message
				$this->session->set_flashdata('post_created', 'Your post has been created');

				redirect('blog/posts');
			}
		}

		public function delete($id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('');
			}

			$this->post_model->delete_post($post_id);

			redirect('admin/posts');
		}

		public function edit($slug){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('');
			}

			$data['post'] = $this->post_model->get_posts($slug);

			// Check user
			// if($this->session->userdata('user_id') != $this->post_model->get_posts($slug)['user_id']){
			// 	redirect('blog');

			// }

			$data['categories'] = $this->post_model->get_categories();

			if(empty($data['post'])){
				show_404();
			}

			$data['title'] = 'Edit Post';

			$this->load->view('template/header');
			$this->load->view('blog/edit', $data);
			$this->load->view('template/footer');
		}

		public function update(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('');
			}

			$this->post_model->update_post();

			// Set message
			$this->session->set_flashdata('post_updated', 'Your post has been updated');

			redirect('admin/posts');
		}
	}