<?php
class Categories extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Categories';

		$data['categories'] = $this->category_model->get_categories();

		$this->load->view('template/header');
		$this->load->view('categories/index', $data);
		$this->load->view('template/footer');
	}

	public function create()
	{
		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('home');
		}

		$data['title'] = 'Create Category';

		$this->form_validation->set_rules('name', 'Name', 'required');

		if ($this->form_validation->run() === FALSE) {
			redirect('admin/categories');
		} else {
			$this->category_model->create_category();

			// Set message
			$this->session->set_flashdata('category_created', 'Your category has been created');

			redirect('admin/categories');
		}
	}

	public function posts($id)
	{
		// $data['title'] = $this->category_model->get_category($id)->name;

		$data['categories'] = $this->post_model->get_categories();

		$data['posts'] = $this->post_model->get_posts_by_category($id);

		$this->load->view('template/header');
		$this->load->view('blog/index', $data);
		$this->load->view('template/footer');
	}

	public function aposts($id)
	{
		$data['title'] = $this->category_model->get_category($id)->name;

		$data['categories'] = $this->post_model->get_categories();

		$data['posts'] = $this->post_model->get_posts_by_category($id);

		$this->load->view('admin/templates/header');
		$this->load->view('admin/templates/navigation');
		$this->load->view('admin/categories', $data);
		$this->load->view('admin/templates/footer');
	}

	public function delete($id)
	{
		// Check login
		if (!$this->session->userdata('logged_in')) {
			redirect('users/login');
		}

		$this->category_model->delete_category($id);

		// Set message
		$this->session->set_flashdata('category_deleted', 'Your category has been deleted');

		redirect('admin/categories');
	}
}
