<?php
class Credits extends CI_Controller
{
  public function index()
  {

    // Check login
    if (!$this->session->userdata('logged_in')) {
      redirect('');
    }

    $data['user'] = $this->user_model->get_user();
    $data['users'] = $this->user_model->get_users();
    $data['wallet'] = $this->credit_model->get_wallet();
    $data['credit_records'] = $this->credit_model->get_records();
    $data['credit_debts'] = $this->credit_model->get_debts();

    $this->load->view('app/templates/header', $data);
    $this->load->view('app/templates/sidenav', $data);
    $this->load->view('app/templates/topnav', $data);
    $this->load->view('app/credits/index', $data);
    $this->load->view('app/templates/footer');
  }

  public function record_refund()
  {

    // Check login
    if (!$this->session->userdata('logged_in')) {
      redirect('');
    }

    $this->credit_model->record_refund();

    redirect('credits');
  }

  public function record_loan()
  {

    // Check login
    if (!$this->session->userdata('logged_in')) {
      redirect('');
    }

    $this->credit_model->record_loan();

    redirect('credits');
  }

  public function refill_wallet()
  {

    // Check login
    if (!$this->session->userdata('logged_in')) {
      redirect('');
    }

    $this->credit_model->refill_wallet();

    redirect('credits');
  }
}
