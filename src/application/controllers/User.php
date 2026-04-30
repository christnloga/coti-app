<?php
class User extends CI_Controller
{

	// Register user
	public function register()
	{
		$data['title'] = 'Sign Up';

		// Upload Image
		$config['upload_path'] = './assets/images/profile';
		$config['allowed_types'] = 'gif|jpg|png';
		// $config['max_size'] = '2048';
		// $config['max_width'] = '2000';
		// $config['max_height'] = '2000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
			$errors = array('error' => $this->upload->display_errors());
			$member_photo = 'user-avatar.png';
		} else {
			$data = array('upload_data' => $this->upload->data());
			$member_photo = $_FILES['userfile']['name'];
		}


		// Encrypt password
		$enc_password = md5($this->input->post('password'));

		$this->user_model->register($enc_password, $member_photo);

		redirect('membres');
	}

	public function create()
	{

		// // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$data['user'] = $this->user_model->get_user();

		$this->load->view('app/templates/header');
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/members/create');
		$this->load->view('app/templates/footer');
	}

	public function edit()
	{

		// // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$data['user'] = $this->user_model->get_user();

		$this->load->view('app/templates/header');
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/profile/edit');
		$this->load->view('app/templates/footer');
	}

	public function edit_member($id)
	{

		// // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$data['auser'] = $this->user_model->get_user_detail($id);
		$data['user'] = $this->user_model->get_user();

		$this->load->view('app/templates/header');
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/members/edit');
		$this->load->view('app/templates/footer');
	}

	public function update()
	{

		$id = $this->input->post('id');

		$this->user_model->update($id);

		redirect('membres/' . $id);
	}

	public function update_photo()
	{
		// Upload Image
		$config['upload_path'] = './assets/images/profile';
		$config['allowed_types'] = 'gif|jpg|png';
		// $config['max_size'] = '2048';
		// $config['max_width'] = '2000';
		// $config['max_height'] = '2000';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) {
			$errors = array('error' => $this->upload->display_errors());
			$member_photo = 'user-avatar.png';
		} else {
			$data = array('upload_data' => $this->upload->data());
			$member_photo = $_FILES['userfile']['name'];
		}

		$id = $this->input->post('id');

		$this->user_model->update_photo($member_photo, $id);

		redirect('profile');
	}

	public function update_password()
	{

		// Encrypt password
		$enc_password = md5($this->input->post('password'));

		$this->user_model->update_password($enc_password);

		redirect('profile');
	}


	public function get_users()
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('');
		}

		$data['users'] = $this->user_model->get_users();
		$data['user'] = $this->user_model->get_user();
		$data['users_count'] = $this->user_model->get_users_count();

		$this->load->view('app/templates/header', $data);
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/members/index', $data);
		$this->load->view('app/templates/footer');
	}

	public function get_users_count()
	{
		$data['users_count'] = $this->user_model->get_users_count();
	}

	public function get_user()
	{

		// // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$data['user'] = $this->user_model->get_user();

		$this->load->view('app/templates/header');
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/profile/index', $data);
		$this->load->view('app/templates/footer');
	}

	public function get_user_detail($id)
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('');
		}

		$data['auser'] = $this->user_model->get_user_detail($id);
		$data['user'] = $this->user_model->get_user();
		// $data['tontines'] = $this->tontine_model->get_tontines();
		$data['membertontines'] = $this->user_model->get_membertontine($id);

		$this->load->view('app/templates/header', $data);
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/members/single', $data);
		$this->load->view('app/templates/footer');
	}

	public function add_record()
	{

		// // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$seance_id = $this->input->post('seance_id');

		$this->user_model->add_record();

		redirect('tontines/sessions/seance/' . $seance_id);
	}

	public function revert_record()
	{

		// // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$seance_id = $this->input->post('seance_id');
		// var_dump($seance_id);

		$this->user_model->revert_record();

		redirect('tontines/sessions/seance/' . $seance_id);
	}

	public function user_data()
	{

		$member_id = $this->input->post('member_id');
		$data['users'] = $this->user_model->get_user();
	}

	public function get_delete_id()
	{

		$data['users'] = $this->collections_model->get_delete_id();
		$user_id = $data['user']['id'];
		// $output .= '<input type="text" value=".$item_id" name="delete_id">';
		echo '<input type="hidden" value="' . $user_id . '" name="delete_id">';
	}

	public function search()
	{

		$output = '';
		$query = $this->input->post('query');
		$data = $this->user_model->search($query);

		foreach ($data->result() as $row) {
			// $output .= '<span>'.$row->first_name.'</span>
			// <p>'.$row->last_name.'</p>';
			$output .= '<div class="list-group list">
								<a href="' . site_url('membres/' . $row->id) . '" class="list-group-item bg-translucent-dark border-0 py-1 my-1">
									<div class="d-flex align-items-center">
										<div class="avatar rounded-circle overflow-hidden" style="transform: scale(0.8);">
											<img src="' . base_url() . 'assets/images/profile/' . $row->photo . '" alt="profile">
										</div>
										<div class="d-flex flex-column ml-2">
											<span class="text-small text-white-50" style="font-size: 16px;">' . $row->first_name . ' ' . $row->last_name . '</span>
										</div>
									</div>
								</a>
							</div>';
			echo $output;
		}
	}

	public function delete()
	{
		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('');
		}

		$delete_id = $this->input->post('delete_id');
		$this->user_model->delete_user($delete_id);

		redirect('membres');
	}

	// Login screen
	public function view()
	{

		$this->load->view('app/templates/header');
		$this->load->view('login/index');
		$this->load->view('app/templates/header');
	}

	// Log in user
	public function login()
	{
		$data['title'] = 'Sign In';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('app/templates/header');
			$this->load->view('login/index', $data);
			$this->load->view('app/templates/header');
		} else {

			// Get username
			$username = $this->input->post('username');
			// Get and encrypt the password
			$password = md5($this->input->post('password'));

			// Login user
			$user_id = $this->user_model->login($username, $password);

			if ($user_id) {
				// Create session
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);

				// Set message
				$this->session->set_flashdata('user_loggedin', 'You are now logged in');

				redirect('monespace');
			} else {
				// Set message
				$this->session->set_flashdata('login_failed', 'Identifiant ou mot de passe incorrect');

				redirect('login');
			}
		}
	}

	// Log user out
	public function logout()
	{
		// Unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');

		// Set message
		$this->session->set_flashdata('user_loggedout', 'You are now logged out');

		redirect('');
	}

	// Check if username exists
	public function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
		if ($this->user_model->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}

	// Check if email exists
	public function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
		if ($this->user_model->check_email_exists($email)) {
			return true;
		} else {
			return false;
		}
	}
}
