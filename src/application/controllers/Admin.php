<?php
    class Admin extends CI_Controller{

      public function view($page, $offset = 0){
      // Check login
			if(!$this->session->userdata('logged_in')){
				redirect('home');
			}
      // Pagination Config	
			$config['base_url'] = base_url() . 'blog/index/';
			$config['total_rows'] = $this->db->count_all('members');
			$config['per_page'] = 20;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');

			// Init Pagination
			$this->pagination->initialize($config);

      $data['title'] = 'Latest Posts';

        $data['products'] = $this->products_model->get_products(FALSE, $config['per_page'], $offset);
        $data['categories'] = $this->products_model->get_categories();
        $data['user'] = $this->user_model->get_user();
        $data['users'] = $this->user_model->get_users();
        $data['users_count'] = $this->user_model->get_user_count();     
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/navigation', $data);
        $this->load->view('admin/'.$page, $data);
        $this->load->view('admin/templates/footer');
      }
      
    }