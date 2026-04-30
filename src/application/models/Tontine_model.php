<?php

use LDAP\Result;

class Tontine_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_tontines()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('tontine', array('state' => 1));
		return $query->result_array();
	}

	public function get_closed_tontines()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('tontine', array('state' => 0));
		return $query->result_array();
	}

	public function get_tontine($id)
	{
		$query = $this->db->get_where('tontine', array('id' => $id));
		return $query->row_array();
	}

	public function get_sessions($id)
	{
		$this->db->order_by('created_on', 'DESC');
		$query = $this->db->get_where('sessions', array('tontine_id' => $id));
		return $query->result_array();
	}

	public function get_records($tontine_id)
	{
		$this->db->order_by('records.rec_id', 'DESC');
		$this->db->join('members', 'members.id = records.user_id');
		$query = $this->db->get_where('records', array('tontine_id' => $tontine_id));
		return $query->result_array();
	}

	public function get_tontinemember($session_id)
	{
		$this->db->join('members', 'members.id = tontinemember._member');
		$this->db->order_by('members.first_name', 'ASC');
		$this->db->order_by('tontinemember.label', 'ASC');
		$query = $this->db->get_where('tontinemember', array('_session' => $session_id));
		return $query->result_array();
	}

	public function create_tontine()
	{
		$data = array(
			'name' => $this->input->post('name'),
			'amount' => $this->input->post('amount'),
			'frequency' => $this->input->post('frequency')
		);

		return $this->db->insert('tontine', $data);
	}

	public function end_tontine($id, $state)
	{
		$data = array(
			'state' => $state
		);

		$this->db->where('id', $id);
		$this->db->update('tontine', $data);
	}

	public function add_member()
	{
		$this->db->where('_tontine', $this->input->post('tontine_id'));
		$this->db->where('_session', $this->input->post('session_id'));
		$this->db->where('_member', $this->input->post('member_id'));
		$result = $this->db->get('tontinemember');

		if($result->num_rows() == 0) {
			$label = 1;
		} else {
			$label = $result->num_rows() + 1;
		}

		$data = array(
			'_tontine' => $this->input->post('tontine_id'),
			'_session' => $this->input->post('session_id'),
			'_member' => $this->input->post('member_id'),
			'label' => $label
		);

		return $this->db->insert('tontinemember', $data);
	}

	public function get_session($id)
	{
		$query = $this->db->get_where('sessions', array('sess_id' => $id));
		return $query->row_array();
	}

	public function create_session()
	{

		$data = array(
			'tontine_id' => $this->input->post('tontine_id'),
			'created_on' => $this->input->post('date'),
			'status' => true
		);

		$this->db->insert('sessions', $data);

		$session_id = $this->db->insert_id();

		if ($this->input->post('tontine_id') == 1) {
			$members = $this->db->get('members')->result_array();
			foreach ($members as $row) {
				$data2 = array(
					'_member' => $row['id'],
					'_tontine' => $this->input->post('tontine_id'),
					'_session' => $session_id,
					'label' => 1
				);
				// Insert record
				$this->db->insert('tontinemember', $data2);
			};
		}

		return true;

	}

	// SEANCE OPERATIONS ------------------------------------------------------------

	public function get_seances($id)
	{
		$this->db->order_by('date', 'DESC');
		$query = $this->db->get_where('seance', array('session_id' => $id));
		return $query->result_array();
	}

	public function get_seance($id)
	{
		$query = $this->db->get_where('seance', array('id' => $id));
		return $query->row_array();
	}

	public function create_seance()
	{
		// Part 1 : Insert new seance data
		$data = array(
			'session_id' => $this->input->post('session_id'),
			'tontine_id' => $this->input->post('tontine_id'),
			'date' => $this->input->post('date')
		);

		$this->db->insert('seance', $data);

		// Part 2 : insert users in seance records table
		$seance_id = $this->db->insert_id();
		$session_id = $this->input->post('session_id');
		$tontine_id = $this->input->post('tontine_id');
		$tontine = $this->db->get_where('tontine', array('id' => $tontine_id))->row_array();
		$tontine_members = $this->db->get_where('tontinemember', array('_tontine' => $tontine_id, '_session' => $session_id))->result_array();

		foreach ($tontine_members as $row) {
			$data2 = array(
				'user_id' => $row['_member'],
				'user_label' => $row['label'],
				'tontine_id' => $this->input->post('tontine_id'),
				'session_id' => $this->input->post('session_id'),
				'seance_id' => $seance_id,
				'debt' => $tontine['amount'],
				'sanction' => 500
			);
			// Insert record
			$this->db->insert('records', $data2);
		};

		return true;
	}

	public function record_sale()
	{
		$total_amount = $this->input->post('total_amount');

		$this->db->where('buyer_id', $this->input->post('user_id'));
		$this->db->where('buyer_label', $this->input->post('user_label'));
		$this->db->where('session_id', $this->input->post('session_id'));
		$result = $this->db->get('vente');
		
		$this->db->where('user_id', $this->input->post('user_id'));
		$this->db->where('user_label', $this->input->post('user_label'));
		$this->db->where('session_id', $this->input->post('session_id'));
		$this->db->where('state', 'none');
		$result2 = $this->db->get('records');

		if ($result2->num_rows() !== 0) {
			$this->session->set_flashdata('sale_not_eligible', 'Ce nom a encore des echecs de payement');
			return;
		}

		if ($result->num_rows() !== 0) {
			$this->session->set_flashdata('sale_state_exist', 'Ce nom a déjà perçu au cours de cette session');
		} else {
			$data = array(
				'sale_amount' => $this->input->post('amount'),
				'cost' => $this->input->post('cost'),
				'buyer_id' => $this->input->post('user_id'), 
				'buyer_label' => $this->input->post('user_label'),
				'tontine_id' => $this->input->post('tontine_id'),
				'session_id' => $this->input->post('session_id'),
				'seance_id' => $this->input->post('seance_id'),
				'sale_date' => $this->input->post('date')
			);

			return $this->db->insert('vente', $data);
		}
	}

	public function record_tirage()
	{

		$tirage_qty = $this->input->post('tirage_qty');

		// $this->db->where('buyer_id', $this->input->post('user_id'));
		// $this->db->where('buyer_label', $this->input->post('user_label'));
		// $this->db->where('session_id', $this->input->post('session_id'));
		// $result = $this->db->get('tirage');
		
		$this->db->order_by('relation_id', 'RANDOM');
		$this->db->limit($tirage_qty );
		$this->db->where('has_tirage', false);
		$this->db->where('_session', $this->input->post('session_id'));
		$result = $this->db->get('tontinemember')->result_array();
		
		$this->db->where('user_id', $this->input->post('user_id'));
		$this->db->where('user_label', $this->input->post('user_label'));
		$this->db->where('session_id', $this->input->post('session_id'));
		$this->db->where('state', 'none');
		$result2 = $this->db->get('records');

		// if ($result2->num_rows() !== 0) {
		// 	$this->session->set_flashdata('sale_not_eligible', 'Ce nom a encore des echecs de payement');
		// 	return;
		// }

		// if ($result->num_rows() !== 0) {
		// 	$this->session->set_flashdata('sale_state_exist', 'Ce nom a déjà perçu au cours de cette session');
		// }

		foreach($result as $row) {
			$data = array(
				'tirage_amount' => $this->input->post('amount'),
				'user_id' => $row['_member'], 
				'user_label' => $row['label'],
				'tontine_id' => $this->input->post('tontine_id'),
				'session_id' => $this->input->post('session_id'),
				'seance_id' => $this->input->post('seance_id'),
				'tirage_date' => $this->input->post('seance_date')
			);
			$this->db->insert('tirage', $data);

			$data2 = array(
				'has_tirage' => 1
			);
			$this->db->where('_member', $row['_member']);
			$this->db->where('label', $row['label']);
			$this->db->where('_session', $this->input->post('session_id'));
			$this->db->update('tontinemember', $data2);
		};
		return;
	}
}
