<?php
class Credit_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_records()
    {
        $this->db->join('members', 'members.id = credit_records.user_id');
        $this->db->order_by('rec_id', 'DESC');
        $query = $this->db->get('credit_records');
        return $query->result_array();
    }

    public function get_wallet()
    {
        $query = $this->db->get('credit_wallet');
        return $query->row_array();
    }

    public function get_debts()
    {
        $this->db->join('members', 'members.id = credit_debts.user_id');
        $this->db->order_by('first_name', 'DESC');
        $query = $this->db->get('credit_debts');
        return $query->result_array();
    }

    public function record_refund()
    {
        $data = array(
            'user_id' => $this->input->post('member_id'),
            'refund' => $this->input->post('amount'),
            'record_date' => $this->input->post('date')
        );

        $this->db->insert('credit_records', $data);

        $wallet_sold = $this->input->post('sold');
        $loan = $this->input->post('amount');
        $new_wallet_sold = $wallet_sold + $loan;

        $data2 = array(
            'sold' => $new_wallet_sold
        );

        // Update credit wallet
        $this->db->update('credit_wallet', $data2);

        // Update credit debt
        $user_id = $this->input->post('member_id');
        // $member_dept = 1;
        $query = $this->db->get_where('credit_debts', array('user_id' => $user_id))->row_array();
        $member_debt = $this->db->get_where('credit_debts', array('user_id' => $user_id))->row()->debt_amount;
        $new_debt = $member_debt - $this->input->post('amount');
        $data3 = array(
            'user_id' => $this->input->post('member_id'),
            'debt_amount' => $new_debt,
            'update_date' => $this->input->post('date')
        );
        $this->db->where('user_id', $user_id)
            ->update('credit_debts', $data3);
    }

    public function record_loan()
    {
        $data = array(
            'user_id' => $this->input->post('member_id'),
            'loan' => $this->input->post('amount'),
            'record_date' => $this->input->post('date')
        );

        $this->db->insert('credit_records', $data);

        $wallet_sold = $this->input->post('sold');
        $loan = $this->input->post('amount');
        $new_wallet_sold = $wallet_sold - $loan;

        $data2 = array(
            'sold' => $new_wallet_sold
        );

        // Update credit wallet
        $this->db->update('credit_wallet', $data2);

        // Update credit debt
        $user_id = $this->input->post('member_id');
        $query = $this->db->get_where('credit_debts', array('user_id' => $user_id))->row_array();

        if (empty($query)) {

            $data3 = array(
                'user_id' => $this->input->post('member_id'),
                'debt_amount' => $this->input->post('amount')
            );
            $this->db->insert('credit_debts', $data3);
        } else {

            $member_debt = $this->db->get_where('credit_debts', array('user_id' => $user_id))->row()->debt_amount;
            $new_debt = $member_debt + $this->input->post('amount');
            $data3 = array(
                'user_id' => $this->input->post('member_id'),
                'debt_amount' => $new_debt,
                'update_date' => $this->input->post('date')
            );
            $this->db->where('user_id', $user_id)
                ->update('credit_debts', $data3);
        }

        return true;
    }

    public function refill_wallet()
    {

        $wallet_sold = $this->input->post('sold');
        $cash_in = $this->input->post('amount');
        $new_wallet_sold = $wallet_sold + $cash_in;

        $data = array(
            'sold' => $new_wallet_sold
        );

        // Update credit wallet
        $this->db->update('credit_wallet', $data);

        return true;
    }
}
