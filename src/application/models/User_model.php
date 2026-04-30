<?php
class User_model extends CI_Model
{
	public function register($enc_password, $member_photo)
	{
		// User data array
		$data = array(
			'first_name' => $this->input->post('firstname'),
			'last_name' => $this->input->post('lastname'),
			'username' => $this->input->post('username'),
			'role' => $this->input->post('role'),
			'title' => $this->input->post('title'),
			'gender' => $this->input->post('gender'),
			'family_status' => $this->input->post('familystatus'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'conjoint' => $this->input->post('conjoint'),
			'conjoint_contact' => $this->input->post('conjoint_contact'),
			'successor' => $this->input->post('successor'),
			'successor_contact' => $this->input->post('successor_contact'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'cni' => $this->input->post('cni'),
			'pass_readable' => $this->input->post('password'),
			'password' => $enc_password,
			'photo' => $member_photo
		);

		// Insert user
		$this->db->insert('members', $data);

		// Get inserted user ID
		$last_id = $this->db->insert_id();

		// Add inserted user to tontines
		$data2 = array(
			'_tontine' => 1,
			'_member' => $last_id
		);
		$data3 = array(
			'_caisse' => 1,
			'_member' => $last_id
		);
		$data4 = array(
			'_caisse' => 2,
			'_member' => $last_id
		);

		$this->db->insert('tontinemember', $data2);
		$this->db->insert('caissemember', $data3);
		$this->db->insert('caissemember', $data4);

		return true;
	}

	public function delete_user($id)
	{

		$this->db->where('id', $id);
		$this->db->delete('members');

		// $this->db->where('post_id', $id);
		// $this->db->delete('comments');

		return true;
	}

	// Log user in
	public function login($username, $password)
	{
		// Validate
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		$result = $this->db->get('members'); 

		if ($result->num_rows() == 1) {
			return $result->row(0)->id;
		} else {
			return false;
		}
	}

	public function get_user()
	{
		$query = $this->db->get_where('members', array('id' => $this->session->userdata('user_id')));
		return $query->row_array();
	}

	public function get_user_detail($id)
	{
		$query = $this->db->get_where('members', array('id' => $id));
		return $query->row_array();
	}

	public function get_users()
	{
		$this->db->order_by('members.first_name', 'ASC');
		$query = $this->db->get('members');
		return $query->result_array();
	}

	public function get_membertontine($id)
	{
		$this->db->join('tontine', 'tontine.id = tontinemember._tontine');
		$query = $this->db->get_where('tontinemember', array('_member' => $id));
		return $query->result_array();
	}

	public function get_users_count()
	{
		$query = $this->db->count_all('members');
		return $query;
	}

	public function search($query)
	{
		$this->db->select('*');
		$this->db->from('members');
		$this->db->like('first_name', $query);
		$this->db->or_like('last_name', $query);
		$this->db->or_like('username', $query);
		$this->db->order_by('members.id', 'DESC');
		return $this->db->get();
	}

	public function add_record()
	{

		$data = array(
			'amount' => $this->input->post('amount'),
			'debt' => 0,
			'sanction' => 0,
			'comment' => $this->input->post('comment'),
			'state' => 'ok',
		);

		$this->db->where('rec_id', $this->input->post('record_id'));
		return $this->db->update('records', $data);
	}

	public function revert_record()
	{

		$data = array(
			'amount' => 0,
			'debt' => 5000,
			'sanction' => 500,
			'comment' => '',
			'state' => 'none',
		);

		$this->db->where('rec_id', $this->input->post('record_id'));
		return $this->db->update('records', $data);
	}

	public function update($id)
	{

		// User data array
		$data = array(
			'first_name' => $this->input->post('firstname'),
			'last_name' => $this->input->post('lastname'),
			'username' => $this->input->post('username'),
			'gender' => $this->input->post('gender'),
			'family_status' => $this->input->post('familystatus'),
			'title' => $this->input->post('title'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'conjoint' => $this->input->post('conjoint'),
			'conjoint_contact' => $this->input->post('conjoint_contact'),
			'successor' => $this->input->post('successor'),
			'successor_contact' => $this->input->post('successor_contact'),
			'contact' => $this->input->post('contact'),
			'address' => $this->input->post('address'),
			'cni' => $this->input->post('cni')
		);

		$where = array('id' => $id);

		// Insert update
		return $this->db->update('members', $data, $where);
	}

	public function update_photo($member_photo, $id)
	{

		// User data array
		$data = array(
			'photo' => $member_photo
		);

		$where = array('id' => $id);

		// Insert update
		return $this->db->update('members', $data, $where);
	}

	public function update_password($enc_password)
	{

		// $id = $this->input->post('id');
		// User data array
		$data = array(
			'password' => $enc_password,
			'pass_readable' => $this->input->post('password'),
		);

		$where = array('id' => $this->session->userdata('user_id'));


		// Insert user
		return $this->db->update('members', $data, $where);
	}

	// Check username exists
	public function check_username_exists($username)
	{
		$query = $this->db->get_where('members', array('username' => $username));
		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}

	// Check email exists
	public function check_email_exists($email)
	{
		$query = $this->db->get_where('members', array('email' => $email));
		if (empty($query->row_array())) {
			return true;
		} else {
			return false;
		}
	}
}
