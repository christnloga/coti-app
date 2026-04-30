<?php
    class App extends CI_Controller{

      public function view($page = 'monespace', $offset = 0){
      // Check login
			if(!$this->session->userdata('logged_in')){
				redirect('login');
			}
      // Pagination Config	
			$config['base_url'] = base_url() . 'blog/index/';
			$config['total_rows'] = $this->db->count_all('members');
			$config['per_page'] = 20;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');

			// Init Pagination
			$this->pagination->initialize($config);

      $this->db->join('tontine', 'tontine.id = tontinemember._tontine');
      $query = $this->db->get_where('tontinemember', array('_member' => $this->session->userdata('user_id')));
      $tontines = $query->result_array();

      
      
      // $this->db->join('members', 'members.id = records.user_id');
      // $query = $this->db->get_where('records', array(
      //   'user_id' => $this->session->userdata('user_id'),
      //   'tontine_id' => 3
      // ));
      // $records = $query->result_array();

      $data['tontines'] = $tontines;
      // $data['records'] = $records;
      $data['caisses'] = $this->caisse_model->get();
      $data['user'] = $this->user_model->get_user();
      $data['users'] = $this->user_model->get_users();
      $data['users_count'] = $this->user_model->get_users_count();

      $this->load->view('app/templates/header', $data);
      $this->load->view('app/templates/sidenav', $data);
      $this->load->view('app/templates/topnav', $data);
      $this->load->view('app/'.$page, $data, $tontines);
      $this->load->view('app/templates/footer');
      }
      
  }