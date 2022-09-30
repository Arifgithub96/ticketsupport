<?php

/**
 * Model Menu
 */
class M_dashboard extends CI_Model{

	public function check_no_tool($gih_tool_no)
	{
		return $this->db->get_where('mold_basic_details', array('gih_tool_no' => $gih_tool_no))->num_rows();
	}

	public function get_totalmaster()//dashboard
	{
		$this->db->select('*');
		$this->db->from('mold_basic_details');
		// $this->db->where('status !=', 3);
		// $this->db->where('status =', 1);
		// $this->db->or_where('status =', 2);
		// $this->db->or_where('status =', 4);
		$this->db->where_in('status', [1,2,4]);
		return $this->db->count_all_results();
	}

	public function get_masteractive($status)//dashboard
	{
		$this->db->select('status');
		$this->db->from('mold_basic_details');
		$this->db->where('status', $status);
		return $this->db->count_all_results();
	}

	public function get_masternonactive()//dashboard
	{
		$this->db->select('status');
		$this->db->from('mold_basic_details');
		$this->db->where('status', 2);
		return $this->db->count_all_results();
	}

	public function get_totalcustomers()//dashboard
	{
		$this->db->select('*');
		$this->db->from('customers');
		return $this->db->count_all_results();
	}

	public function get_customers()//dashboard
	{
		$this->db->select('*');
		$this->db->from('customers');
		return $this->db->get()->result();
	}

	public function get_troubleticket($id)//dashboard
	{
		date_default_timezone_set('Asia/Jakarta');
		$bulan 	= date('m');//Mounth
		$year 	= date('Y');//Year

		$this->db->select('*');
		$this->db->from('trouble_ticket');
		$this->db->where('assigned_to', $id);
		$this->db->or_where('status', 1);//Open
		$this->db->or_where('status', 2);//In-Progress
		$this->db->or_where('status', 3);//Waiting Verify
		$this->db->or_where('status', 8);//Mold Down
		// $this->db->where('MONTH(trouble_ticket.time_request)',$bulan);
    	$this->db->where('YEAR(trouble_ticket.time_request)',$year);
		return $this->db->count_all_results();
		// return $this->db->get()->result();
	}

	public function get_tot_priority()
	{
		date_default_timezone_set('Asia/Jakarta');
		$bulan 	= date('m');//Mounth
		$year 	= date('Y');//Year

		$this->db->select('*');
		$this->db->from('trouble_ticket');
		$this->db->where_in('trouble_ticket.status', [1,2,3,8]);
		// $this->db->where('assigned_to', 2);
		// $this->db->where('MONTH(trouble_ticket.time_request)',$bulan);
    	$this->db->where('YEAR(trouble_ticket.time_request)',$year);
		return $this->db->count_all_results();
	}

	public function get_tt_status_tool($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$bulan 	= date('m');//Mounth
		$year 	= date('Y');//Year

		$this->db->select('*');
		$this->db->from('trouble_ticket');
		$this->db->where('status', $id);
		$this->db->where('assigned_to', 2);
		// $this->db->where('MONTH(trouble_ticket.time_request)',$bulan);
    	$this->db->where('YEAR(trouble_ticket.time_request)',$year);
		return $this->db->count_all_results();
	}

	public function get_tt_status_machine($id)
	{
		$this->db->select('*');
		$this->db->from('trouble_ticket');
		$this->db->where('status', $id);
		$this->db->where('assigned_to', 1);
		return $this->db->count_all_results();
	}

	public function get_tt_priority($status='')
	{
		date_default_timezone_set('Asia/Jakarta');
		$bulan 	= date('m');//Mounth
		$year 	= date('Y');//Year

		$this->db->select('*');
		$this->db->from('trouble_ticket');
		$this->db->where('priority', $status);
		$this->db->where_in('trouble_ticket.status', [1,2,3,8]);
		// $this->db->where('assigned_to', 2);
		// $this->db->where('MONTH(trouble_ticket.time_request)',$bulan);
    	$this->db->where('YEAR(trouble_ticket.time_request)',$year);
		return $this->db->count_all_results();
	}

	public function trouble_ticket_data($colum)
	{
		date_default_timezone_set('Asia/Jakarta');
		$bulan 	= date('m');//Mounth
		$year 	= date('Y');//Year

		$this->db->select_sum($colum);
		// $this->db->where('assigned_to', 2);
		$this->db->where_in('trouble_ticket.status', [1,2,3,8]);
		// $this->db->where('MONTH(trouble_ticket.time_request)',$bulan);
    	$this->db->where('YEAR(trouble_ticket.time_request)',$year);
		return $this->db->get('trouble_ticket');
	}

	// public function data_all_tt()
	// {
	// 	date_default_timezone_set('Asia/Jakarta');
	// 	$bulan 	= date('m');//Mounth
	// 	$year 	= date('Y');//Year

	// 	$this->db->select('trouble_ticket.*, users.first_name, users.employee_no, users.last_name, groups.description, assigned_to.name as assigned_name');
	// 	$this->db->from('trouble_ticket');
	// 	$this->db->join('users','users.id = trouble_ticket.requestor_id',"left");
	// 	$this->db->join('users_groups','users_groups.user_id = users.id',"left");
	// 	$this->db->join('groups','groups.id = users_groups.group_id');
	// 	$this->db->join('assigned_to','assigned_to.id = trouble_ticket.assigned_to');
	// 	// $this->db->where('MONTH(trouble_ticket.time_request)',$bulan);
 //    	$this->db->where('YEAR(trouble_ticket.time_request)',$year);
 //    	// $this->db->where('assigned_to', 2);
 //    	$this->db->where('trouble_ticket.status !=', 4);
 //    	$this->db->where('trouble_ticket.status !=', 5);
 //    	$this->db->where('trouble_ticket.status !=', 6);
 //    	$this->db->order_by('trouble_ticket.time_request', 'desc');

 //    	// $this->db->limit(6);
 //    	return $this->db->get()->result();

	// 	// date_default_timezone_set('Asia/Jakarta');
	// 	// $bulan 	= date('m');//Mounth
	// 	// $year 	= date('Y');//Year

	// 	// $this->db->select('*');
	// 	// $this->db->from('trouble_ticket');
	// 	// $this->db->where('MONTH(time_request)',$bulan);
 //  		// $this->db->where('YEAR(time_request)',$year);
 //  		// $this->db->limit(6);
	// 	// return $this->db->get()->result();
	// }

	public function get_table_ttmaster()
	{
		$this->db->select('trouble_ticket.*, users.first_name, users.employee_no, users.last_name, groups.description, assigned_to.name as assigned_name');
		$this->db->from('trouble_ticket');
		$this->db->join('users','users.id = trouble_ticket.requestor_id',"left");
		$this->db->join('users_groups','users_groups.user_id = users.id',"left");
		$this->db->join('groups','groups.id = users_groups.group_id');
		$this->db->join('assigned_to','assigned_to.id = trouble_ticket.assigned_to');
		$this->db->where_in('trouble_ticket.status', [1,2,3,8]);
    	$this->db->order_by('trouble_ticket.time_request', 'desc');
    	return $this->db->get()->result();
	}

	public function get_tt_permounth($bulan)
	{
		date_default_timezone_set('Asia/Jakarta');
		// $bulan 	= date('m');//Mounth
		$year 	= date('Y');//Year

		$this->db->select('*');
		$this->db->from('trouble_ticket');
		$this->db->where('MONTH(trouble_ticket.time_request)',$bulan);
    	$this->db->where('YEAR(trouble_ticket.time_request)',$year);
    	$this->db->where('assigned_to', 2);
		return $this->db->count_all_results();
	}

	public function get_data_machine()//get data machine moulding
	{
		$this->db->select('*');
		$this->db->from('moulding_machine');
		return $this->db->count_all_results();
	}

	public function get_machiene_status($status)
	{
		$this->db->select('*');
		$this->db->from('moulding_machine');
		$this->db->where('status', $status);
		return $this->db->count_all_results();
	}
}

?>
