<?php
	class Caisse_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		
		public function create(){
			$data = array(
				'name' => $this->input->post('name')
			);
			
			return $this->db->insert('caisses', $data);
		}
		
		public function get(){
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('caisses');
			return $query->result_array();
		}

		public function view($id){
			$query = $this->db->get_where('caisses', array('id' => $id));
			return $query->row_array();
		}

		public function get_caissemember($caisse_id){
			$this->db->order_by('members.first_name', 'ASC');
			$this->db->join('members', 'members.id = caissesolds.user_id');
			$query = $this->db->get_where('caissesolds', array('caisse_id' => $caisse_id));
			return $query->result_array();
		}

		public function get_caisserecords($caisse_id){
			$this->db->order_by('rec_id', 'DESC');
			$this->db->join('members', 'members.id = caisserecords.user_id');
			$query = $this->db->get_where('caisserecords', array('caisse_id' => $caisse_id));
			return $query->result_array();
		}

		public function add_member(){

			$this->db->where('_caisse', $this->input->post('caisse_id'));
			$this->db->where('_member', $this->input->post('member_id'));
			$result = $this->db->get('caissemember');

			if ($result->num_rows() !== 0) {
				$this->session->set_flashdata('caisse_member_exist', 'Ajout impossible, ce membre existe déjà dans la caisse');
			} else {
				$data = array(
					'_caisse' => $this->input->post('caisse_id'),
					'_member' => $this->input->post('member_id')
				);
				
				$data2 = array(
					'caisse_id' => $this->input->post('caisse_id'),
					'user_id' => $this->input->post('member_id')
				);
	
				$this->db->insert('caissemember', $data);
				$this->db->insert('caissesolds', $data2);
			}

			return true;
		}

		public function update_sold($cach_in)
		{

			$sold = $this->input->post('sold');
			$new_sold = $sold + $cach_in;
			$data = array(
				
				'member_sold' => $new_sold
			);
			// Update member's sold in caissesolds table
			// $where = array('user_id' => $this->input->post('member_id'));
			$this->db->where('user_id', $this->input->post('member_id'));
			$this->db->where('caisse_id', $this->input->post('caisse_id'));
			$this->db->update('caissesolds', $data);

			// Begin caisses operation
			// $caisse_id = $this->input->post('caisse_id');
			
			// $this->db->select_sum('member_sold');
			// $this->db->where('caisse_id', $caisse_id);
			// $query = $this->db->get('caissesolds')->row();

			// $caisse_sold = $query;

			// Update sold in caisses table
			// $this->db->where('id', $caisse_id);
			// $this->db->update('caisses', $caisse_sold);

			return true;
		}

		public function withdraw_sold($cach_out)
		{

			$sold = $this->input->post('sold');
			$new_sold = $sold - $cach_out;

			$data = array(				
				'member_sold' => $new_sold
			);

			$this->db->where('user_id', $this->input->post('member_id'));
			$this->db->where('caisse_id', $this->input->post('caisse_id'));
			$this->db->update('caissesolds', $data);

			// Create record
			$data2 = array(
				'caisse_id' => $this->input->post('caisse_id'),
				'user_id' => $this->input->post('member_id'),
				'cash_out' => $cach_out,
				'record_date' => $this->input->post('date')
			);

			$this->db->insert('caisserecords', $data2);

			return true;
		}

		public function create_record($cach_in)
		{
			$data = array(
				'caisse_id' => $this->input->post('caisse_id'),
				'user_id' => $this->input->post('member_id'),
				'amount' => $cach_in,
				'record_date' => $this->input->post('date')
			);

			return $this->db->insert('caisserecords', $data);
		}

		// public function delete_category($id){
		// 	$this->db->where('id', $id);
		// 	$this->db->delete('categories');
		// 	return true;
		// }
	}
