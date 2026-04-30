<?php
class Caisses extends CI_Controller
{
  public function index()
  {

    // Check login
    if (!$this->session->userdata('logged_in')) {
      redirect('');
    }

    $data['user'] = $this->user_model->get_user();
    $data['caisses'] = $this->caisse_model->get();

    $this->load->view('app/templates/header', $data);
    $this->load->view('app/templates/sidenav', $data);
    $this->load->view('app/templates/topnav', $data);
    $this->load->view('app/caisses/index', $data);
    $this->load->view('app/templates/footer');
  }

  public function view($id)
  {

    // Check login
    if (!$this->session->userdata('logged_in')) {
      redirect('');
    }

    $data['user'] = $this->user_model->get_user();
    $data['users'] = $this->user_model->get_users();
    $data['caisse'] = $this->caisse_model->view($id);
		$data['caissemembers'] = $this->caisse_model->get_caissemember($id);
		$data['caisserecords'] = $this->caisse_model->get_caisserecords($id);


    $this->load->view('app/templates/header', $data);
    $this->load->view('app/templates/sidenav', $data);
    $this->load->view('app/templates/topnav', $data);
    $this->load->view('app/caisses/single', $data);
    $this->load->view('app/templates/footer');
  }

  public function create()
  {
    // // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
    }
    
    $this->caisse_model->create();

    redirect('caisses');
  }

  public function add_member()
  {

    // Check login
    if (!$this->session->userdata('logged_in')) {
      redirect('');
    }

    $caisse_id = $this->input->post('caisse_id');

    $this->caisse_model->add_member();

    redirect('caisses/'.$caisse_id);

  }

  public function update_sold()
  {

    // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

    $cash_in = $this->input->post('cach_in');
    $caisse_id = $this->input->post('caisse_id');

    $this->caisse_model->update_sold($cash_in);
    $this->caisse_model->create_record($cash_in);

    redirect('caisses/'.$caisse_id);

  }

  public function withdraw_sold()
  {

    // Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}

    $cash_out = $this->input->post('cach_out');
    $caisse_id = $this->input->post('caisse_id');

    $this->caisse_model->withdraw_sold($cash_out);
    // $this->caisse_model->create_record($cash_out);

    redirect('caisses/'.$caisse_id);

  }

}
