<?php

/**
 * Model Menu
 */
class M_ticket_tool extends CI_Model{

    public function get_data()
    {
        $this->db->select('ticket_tooling.*, users.employee_no, users.first_name, assigned_opt.name as name_dept, groups.description');
        $this->db->from('ticket_tooling');
        $this->db->join('users','users.id = ticket_tooling.id_request',"left");
        $this->db->join('users_groups','users_groups.user_id = users.id',"left");
        $this->db->join('groups','groups.id = users_groups.group_id',"left");
        $this->db->join('assigned_opt','assigned_opt.id = groups.id_assigned_opt',"left");
        return $this->db->get()->result();
    }

    public function get_user()
    {
        $this->db->select('users.id as user_id, users.employee_no, users.first_name, groups.description, groups.name as dept');
		$this->db->from('users');
		$this->db->join('users_groups','users_groups.user_id = users.id',"left");
		$this->db->join('groups','groups.id = users_groups.group_id');
		$this->db->join('assigned_opt','assigned_opt.id = groups.id_assigned_opt');
        $this->db->where('users.id !=', 1);
        $this->db->where('users.id !=', 2);
        return $this->db->get()->result();
    }

    public function check_noticket($ticket_no)
    {
        return $this->db->get_where('ticket_tooling', array('ticket_no' => $ticket_no))->num_rows();
    }

    public function insert_ticket($data)
	{
		return $this->db->insert('ticket_tooling', $data);
	}

    public function get_user_row($user_id='')//ambil data user
	{
		$this->db->select('users.id as user_id, users.email, users.employee_no, users.first_name, groups.description, groups.name as dept');
		$this->db->from('users');
		$this->db->join('users_groups','users_groups.user_id = users.id',"left");
		$this->db->join('groups','groups.id = users_groups.group_id');
		$this->db->join('assigned_opt','assigned_opt.id = groups.id_assigned_opt','left');
		$this->db->where('users.id', $user_id);
		$this->db->where('users.active !=', 0);
		return $this->db->get()->row();
	}

    public function m_row_ticket($id='')
    {
        $this->db->select('*');
        $this->db->from('ticket_tooling');
        $this->db->where('ticket_no', $id);
        return $this->db->get()->row();
    }

    public function update_status($data, $ticket_no)
    {
        $this->db->where('ticket_no', $ticket_no);
		return $this->db->update('ticket_tooling', $data);
    }

    public function delete_tt_machine($id)
    {
        $this->db->where('ticket_no', $id);
        $this->db->delete('ticket_tooling');
    }

}

?>