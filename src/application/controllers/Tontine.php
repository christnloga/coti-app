<?php
class Tontine extends CI_Controller
{

	public function index()
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('');
		}

		$data['tontines'] = $this->tontine_model->get_tontines();
		$data['user'] = $this->user_model->get_user();
		$data['users'] = $this->user_model->get_users();

		$this->load->view('app/templates/header', $data);
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/tontines/index', $data);
		$this->load->view('app/templates/footer');
	}

	public function closed()
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('');
		}

		$data['tontines'] = $this->tontine_model->get_closed_tontines();
		$data['user'] = $this->user_model->get_user();
		$data['users'] = $this->user_model->get_users();

		$this->load->view('app/templates/header', $data);
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/tontines/index', $data);
		$this->load->view('app/templates/footer');
	}

	public function view($id)
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('');
		}

		$data['tontine'] = $this->tontine_model->get_tontine($id);
		$tontine_id = $data['tontine']['id'];
		$data['records'] = $this->tontine_model->get_records($tontine_id);
		$data['sessions'] = $this->tontine_model->get_sessions($tontine_id);
		$data['tontinemembers'] = $this->tontine_model->get_tontinemember($tontine_id);
		// $data['user'] = $this->user_model->get_user();

		if (empty($data['tontine'])) {
			show_404();
		}

		$data['user'] = $this->user_model->get_user();
		$data['users'] = $this->user_model->get_users();

		$this->load->view('app/templates/header', $data);
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/tontines/single', $data);
		$this->load->view('app/templates/footer');
	}

	public function create()
	{

		// // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$this->tontine_model->create_tontine();

		// Set message
		$this->session->set_flashdata('Tontine_created', 'The new tontine have been created');

		redirect('tontine');
	}

	public function create_tontine()
	{

		// // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$data['user'] = $this->user_model->get_user();

		$this->load->view('app/templates/header');
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/tontines/create');
		$this->load->view('app/templates/footer');
	}

	public function save_tontine()
	{

		// // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$this->load->view('app/templates/header');
		$this->load->view('app/templates/sidenav');
		$this->load->view('app/templates/topnav');
		$this->load->view('app/tontines/single');
		$this->load->view('app/templates/footer');

		$this->tontine_model->create_tontine();

		// Set message
		$this->session->set_flashdata('Tontine_created', 'The new tontine have been created');

		redirect('tontines');
	}

	public function end_tontine()
	{
		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$id = $this->input->post('end');
		$state = $this->input->post('state');

		$this->tontine_model->end_tontine($id, $state);

		// Set message
		$this->session->set_flashdata('category_deleted', 'Successfully added to end list');

		// redirect('tontines');
	}

	public function add_member()
	{

		// // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$session_id = $this->input->post('session_id');

		$this->tontine_model->add_member();

		// Set message
		$this->session->set_flashdata('Tontine_created', 'The new tontine have been created');

		redirect('tontines/sessions/' . $session_id);
	}

	public function create_session()
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$tontine_id = $this->input->post('tontine_id');

		$this->tontine_model->create_session();

		redirect('tontines/' . $tontine_id);
	}

	public function get_session($id)
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$data['session'] = $this->tontine_model->get_session($id);
		$data['tontinemembers'] = $this->tontine_model->get_tontinemember($id);
		$data['seances'] = $this->tontine_model->get_seances($id);
		$data['user'] = $this->user_model->get_user();
		$data['users'] = $this->user_model->get_users();

		$this->load->view('app/templates/header', $data);
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/tontines/session', $data);
		$this->load->view('app/templates/footer');
	}

	// SEANCE OPERATIONS ------------------------------------------------------------

	public function create_seance()
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$session_id = $this->input->post('session_id');

		$this->tontine_model->create_seance();

		redirect('tontines/sessions/' . $session_id);
	}

	public function get_seance($id)
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$data['seance'] = $this->tontine_model->get_seance($id);
		$data['user'] = $this->user_model->get_user();
		$data['users'] = $this->user_model->get_users();

		$this->load->view('app/templates/header', $data);
		$this->load->view('app/templates/sidenav', $data);
		$this->load->view('app/templates/topnav', $data);
		$this->load->view('app/tontines/seance', $data);
		$this->load->view('app/templates/footer');
	}
	
	public function record_sale()
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$seance_id = $this->input->post('seance_id');

		$this->tontine_model->record_sale();

		redirect('tontines/sessions/seance/' . $seance_id);

	}

	public function record_tirage()
	{

		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

		$seance_id = $this->input->post('seance_id');

		$this->tontine_model->record_tirage();

		redirect('tontines/sessions/seance/' . $seance_id);

	}
	
}
