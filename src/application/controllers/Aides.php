<?php
class Aides extends CI_Controller
{
  public function index()
  {

    // Check login
    if (!$this->session->userdata('logged_in')) {
      redirect('');
    }

    $data['user'] = $this->user_model->get_user();
    $data['users'] = $this->user_model->get_users();
    $data['caisses'] = $this->caisse_model->get();
    $data['helptypes'] = $this->aides_model->get_help_types();
    $data['records'] = $this->aides_model->get();
		// var_dump(now());

    $this->load->view('app/templates/header', $data);
    $this->load->view('app/templates/sidenav', $data);
    $this->load->view('app/templates/topnav', $data);
    $this->load->view('app/aides/index', $data);
    $this->load->view('app/templates/footer');
  }

  public function create()
  {
    // // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
    }
    
    $this->aides_model->create_record();

    redirect('aides');
  }

  public function add_member()
  {

    // Check login
    if (!$this->session->userdata('logged_in')) {
      redirect('');
    }

    $caisse_id = $this->input->post('caisse_id');

    $this->aides_model->add_member();

    redirect('caisses/'.$caisse_id);

  }

  public function create_record()
  {
    $this->aides_model->create_record();
  }

}
