<?php

/**
 * Model Menu
 */
class M_user extends CI_Model{

	public function get_users()
	{
		$this->db->select('users.*, groups.name as name_group, groups.description, groups.e_category, groups.e_group, groups.designation, groups.function, groups.group');
		$this->db->from('users');
		$this->db->join('employees', 'employees.employee_no = users.employee_no', "left" );
		$this->db->join('users_groups', 'users_groups.user_id = users.id', "left" );
		$this->db->join('groups', 'groups.id = users_groups.group_id', "left" );
		// $this->db->join('employees', 'employees.id = users.id_uregister', "left" );
		return $this->db->get()->result();
	}

	public function get_group()
	{
		$this->db->select('*');
		$this->db->from('groups');
		return $this->db->get()->result();
	}

	public function chek_email_employee($email)
	{
		return $this->db->get_where('employees', array('email' => $email))->num_rows();
	}

	public function check_email($email)
	{
		return $this->db->get_where('users', array('email' => $email))->num_rows();
	}

	public function data_groups($group)
	{
		$this->db->select('*');
		$this->db->from('groups');
		$this->db->where('id', $group);
		return $this->db->get()->row();
	}

	public function insert_employees($data)
	{
		$this->db->insert('employees', $data);
		$insertId = $this->db->insert_id();
		return $insertId;
	}

	public function insert_group($data)
	{
		return $this->db->insert('users_groups', $data);
	}

	public function detail_users($id='')
	{
		// $this->db->select('users.*, employees.address, employees.birthday, employees.gender, employees.file_picture,groups.id as id_group, groups.name, groups.description');
		// $this->db->from('users');
		// $this->db->join('employees', 'employees.employee_no = users.employee_no', "left" );
		// $this->db->join('users_groups', 'users_groups.user_id = users.id', "left" );
		// $this->db->join('groups', 'groups.id = users_groups.group_id', "left" );
		$this->db->select('users.*, employees.address, employees.birthday, employees.gender, employees.file_picture, employees.id_group, groups.name as name_group, groups.description, groups.e_category, groups.e_group, groups.designation, groups.function, groups.group');
		$this->db->from('users');
		$this->db->join('employees', 'employees.employee_no = users.employee_no', "left" );
		$this->db->join('users_groups', 'users_groups.user_id = users.id', "left" );
		$this->db->join('groups', 'groups.id = users_groups.group_id', "left" );
		$this->db->where('users.id', $id);
		return $this->db->get()->row();
	}

	public function update_nonactive_user($id='')
	{
		$this->db->set('active', 0);
		$this->db->where('id', $id);
		$this->db->update('users');
	}

	public function update_active_user($id='')
	{
		$this->db->set('active', 1);
		$this->db->where('id', $id);
		$this->db->update('users');
	}

	public function chek_email_employee_edit($employee_no, $email)
	{
		$this->db->select('email');
		$this->db->from('employees');
		$this->db->where('employee_no', $employee_no);
		$this->db->where('email', $email);
		return $this->db->get()->row();
	}

	public function get_id_uregister($id)
	{
		$this->db->select('id_uregister');
		$this->db->from('users');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}

	public function update_employees($data_employee, $id_uregister)
	{
		$this->db->where('id', $id_uregister);
		return $this->db->update('employees', $data_employee);
	}

	public function update_group($id, $data_groups)
	{
		// return $this->db->insert('users_groups', $data);
		$this->db->where('user_id', $id);
		return $this->db->update('users_groups', $data_groups);
	}


	public function get_data_group()
	{
		$this->db->select('*');
		$this->db->from('groups');
		return $this->db->get()->result();
	}

	public function get_data_dept()
	{
		$this->db->select('*');
		$this->db->from('assigned_opt');
		return $this->db->get()->result();
	}

	public function get_data_dept_row($id_assigned_opt)
	{
		$this->db->select('*');
		$this->db->from('assigned_opt');
		$this->db->where('id', $id_assigned_opt);
		return $this->db->get()->row();
	}

	public function check_group($function_group)
	{
		return $this->db->get_where('groups', array('name' => $function_group))->num_rows();
	}

	public function check_update_group($cek_id_group)//cek jika update group
	{
		return $this->db->get_where('groups', array('name' => $cek_id_group))->num_rows();
	}

	public function insert_new_group($data)
	{
		return $this->db->insert('groups', $data);
	}

	public function get_row_dept($id)
	{
		$this->db->select('*');
		$this->db->from('groups');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}

	public function update_group_row($data, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update('groups', $data);
	}

	public function delete_group($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('groups');
	}

	function get_role_by_group_id($id){
		$this->db->select('*');
		$this->db->where('id_user_group',$id);
		$this->db->from('users_role');
		return $this->db->get();
	}

	function insert_role($table,$data){
		return $this->db->insert_batch($table,$data);
	}

	function delete_user_role($table,$where){
		$this->db->where($where);
		return $this->db->delete($table);
	}

	function get_data_menu_with_role($id){
		$this->db->select("*");
		$this->db->from("menu a");
		$this->db->join('users_role b','b.id_menu=a.id_menu','left');
		$this->db->join('groups c','c.id=b.id_user_group','left');
		$this->db->where('b.id_user_group',$id);
		return $this->db->get();
	}

	public function get_data_menu(){
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->order_by('menu_sortable');
		return $this->db->get();
	}

	function get_group_by_id($id){
		$this->db->select("*");
		$this->db->where('id',$id);
		$this->db->from("groups");
		return $this->db->get();
	}

	public function get_menu()
	{
		$this->db->select('*');
		$this->db->from('menu');
		return $this->db->get()->result();
	}

	public function get_parent_menu($id){
		$id = $id - 1; 
		$id = ($id < 0) ? '0' : $id; 
		$this->db->select("id_menu,menu_name");
		$this->db->where('menu_level',$id);
		$this->db->where('menu_url','#');
		$this->db->order_by('menu_sortable','asc');
		$this->db->from('menu');
		return $this->db->get();
	}

	public function get_posisi_sortable(){
		$this->db->select("MAX(menu_sortable) as posisi");
		$this->db->from('menu');
		return $this->db->get();
	}

	public function add_new_menu($data,$table){
		$this->db->insert($table,$data);
	}

	public function get_detail_menu($id_menu)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('id_menu', $id_menu);
		return $this->db->get()->row();
	}

	public function get_menu_level($id)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('menu_level', $id);
		return $this->db->get();
	}

	public function update_menu($data, $id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		return $this->db->update('menu', $data);
	}

	public function delete_data_menu($id)
	{
		$this->db->where('id_menu', $id);
		$this->db->delete('menu');
	}

	function random_str($length, $keyspace = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ')
	{
	    $pieces = [];
	    $max = mb_strlen($keyspace, '8bit') - 1;
	    for ($i = 0; $i < $length; ++$i) {
	        $pieces []= $keyspace[rand(0, $max)];
	    }
	    return implode('', $pieces);
	}

	public function insert_confirm_code($email, $code)
	{
		$this->db->set('confirm_code', $code);
		$this->db->where('username', $email);
		return $this->db->update('users');
	}

}

?>