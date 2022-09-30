<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Register
 */
class M_account extends CI_Model{

	// private $table1 = 'u_user_register';
	// private $table2 = 'users';

	public function cek_user($user_id)
	{
		$this->db->select('id_uregister');
		$this->db->from('users');
		// $this->db->join('u_user_register', 'u_user_register.id = users.id','left');
		$this->db->where('users.id', $user_id);
		return $this->db->get()->row();
	}

	public function cek_user_register($idreg)
	{
		$this->db->select('u_user_register.*, users.email, users.username');
		$this->db->from('u_user_register');
		$this->db->join('users', 'u_user_register.id = users.id_uregister','left');
		$this->db->where('u_user_register.id', $idreg);
		return $this->db->get()->row();
	}

	function update_user($data_users,$id)
	{
		return $this->db->where('id_uregister', $id)->update('users', $data_users);
	}

	function update_user_reg($data_users_reg,$id)
	{
		return $this->db->where('id', $id)->update('u_user_register', $data_users_reg);
	}

	function update_username($data,$id)
	{
		return $this->db->where('id', $id)->update('users', $data);
	}

}


?>