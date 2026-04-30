<?php
class Aides_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get()
    {
        $this->db->join('members', 'members.id = helprecords.user_id');
        $this->db->join('helptypes', 'helptypes.type_id = helprecords.type_id');
        $this->db->order_by('help_id', 'DESC');
        $query = $this->db->get('helprecords');
        return $query->result_array();
    }

    public function create_record()
    {
		$type_id = $this->input->post('type_id');
		$member_id = $this->input->post('member_id');
		$help_date = $this->input->post('date');

		if ($type_id == 1 || $type_id == 2 || $type_id == 3) {
			$this->db->where('user_id', $member_id);
			$this->db->where('type_id', $type_id);
			$result = $this->db->get('helprecords');
			
			if ($result->num_rows() !== 0) {
				$this->session->set_flashdata('help_not_eligible', 'Ce membre a bénéficié cette aide et ne peut plus en bénéficier');
				return;
			}
		}

		if ($type_id == 5 || $type_id == 6) {
			$this->db->where('user_id', $member_id);
			$this->db->where('type_id', $type_id);
			$this->db->where('help_date', $help_date);
			$result = $this->db->get('helprecords');

			if ($result->num_rows() !== 0) {
				$this->session->set_flashdata('help_not_eligible', 'Ce membre a attent le maximum de cette aide pour cette année, il sera à nouveau éligible l an prochain');
				return;
			}
		}


        $data = array(
            'user_id' => $this->input->post('member_id'),
            'amount' => $this->input->post('amount'),
            'source_id' => $this->input->post('source'),
            'type_id' => $this->input->post('type_id'),
            'help_date' => $this->input->post('date')
        );

        $this->db->insert('helprecords', $data);

        $this->db->where('caisse_id', $this->input->post('source'));
        $this->db->from('caissesolds');
        $members_from_sold = $this->db->count_all_results();

        $help_amount = $this->input->post('amount');
        $divident = $help_amount / $members_from_sold;

        $caisse_solds = $this->db->get_where('caissesolds', array('caisse_id' => $this->input->post('source')))->result_array();

        foreach ($caisse_solds as $row) {
            $data2 = array(
                'member_sold' => $row['member_sold'] - $divident
            );
            // Update members solds
            $this->db->where('user_id', $row['user_id']);
            $this->db->update('caissesolds', $data2);
        };

        return true;
    }

	public function get_help_types(){
		$this->db->order_by('type_id', 'DESC');
		$query = $this->db->get('helptypes');
		return $query->result_array();
	}

}
