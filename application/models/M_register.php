<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Model Register
 */
class M_register extends CI_Model{

	private $table1 = 'u_user_register';
	private $table2 = 'users';

	const MAX_PASSWORD_SIZE_BYTES = 4096;

	public function __construct()
	{

		// initialize hash method options (Bcrypt)
		$this->hash_method = $this->config->item('hash_method', 'ion_auth');

	}

	public function insert_userregister($additional_data)
	{
		$this->db->insert($this->table1, $additional_data);
		$last_insert_id = $this->db->insert_id(); // letakkan tepat dibawah query insert
		return $last_insert_id;
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

	function check_reg($id)
	{
		$this->db->select('id, confirm_code');
		$this->db->from($this->table1);
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}


	function update_active($id)
	{
		$this->db->set('active', 1);
		$this->db->where('id_uregister', $id);
		return $this->db->update($this->table2);
	}

	function cek_email($email)
	{
		$this->db->select('*');
		$this->db->from($this->table2);
		$this->db->where('email', $email);
		$this->db->where('active', 1);
		return $this->db->get()->row();
	}

	public function insert_code($email, $code_verify)
	{
		$this->db->set('verify_code', $code_verify);
		$this->db->where('email', $email);
		$this->db->where('active', 1);
		return $this->db->update($this->table2);
	}

	public function cek_data_user($email_db, $code_verify_db)
	{
		$this->db->select('*');
		$this->db->from($this->table2);
		$this->db->where('email', $email_db);
		$this->db->where('verify_code', $code_verify_db);
		$this->db->where('active', 1);
		return $this->db->get()->row();
	}

	public function update_pass($email_db, $code, $password)
	{	
		$password_has = $this->hash_password($password);
		$this->db->set('password', $password_has);
		$this->db->where('email', $email_db);
		$this->db->where('verify_code', $code);
		$this->db->where('active', 1);
		return $this->db->update($this->table2);
	}

	public function hash_password($password, $identity = NULL)
	{
		// Check for empty password, or password containing null char, or password above limit
		// Null char may pose issue: http://php.net/manual/en/function.password-hash.php#118603
		// Long password may pose DOS issue (note: strlen gives size in bytes and not in multibyte symbol)
		if (empty($password) || strpos($password, "\0") !== FALSE ||
			strlen($password) > self::MAX_PASSWORD_SIZE_BYTES)
		{
			return FALSE;
		}

		$algo = $this->_get_hash_algo();
		$params = $this->_get_hash_parameters($identity);

		if ($algo !== FALSE && $params !== FALSE)
		{
			return password_hash($password, $algo, $params);
		}

		return FALSE;
	}

	protected function _get_hash_algo()
	{
		$algo = FALSE;
		switch ($this->hash_method)
		{
			case 'bcrypt':
				$algo = PASSWORD_BCRYPT;
				break;

			case 'argon2':
				$algo = PASSWORD_ARGON2I;
				break;

			default:
				// Do nothing
		}

		return $algo;
	}

	protected function _get_hash_parameters($identity = NULL)
	{
		// Check if user is administrator or not
		$is_admin = FALSE;
		if ($identity)
		{
			$user_id = $this->get_user_id_from_identity($identity);
			if ($user_id && $this->in_group($this->config->item('admin_group', 'ion_auth'), $user_id))
			{
				$is_admin = TRUE;
			}
		}

		$params = FALSE;
		switch ($this->hash_method)
		{
			case 'bcrypt':
				$params = [
					'cost' => $is_admin ? $this->config->item('bcrypt_admin_cost', 'ion_auth')
										: $this->config->item('bcrypt_default_cost', 'ion_auth')
				];
				break;

			case 'argon2':
				$params = $is_admin ? $this->config->item('argon2_admin_params', 'ion_auth')
									: $this->config->item('argon2_default_params', 'ion_auth');
				break;

			default:
				// Do nothing
		}

		return $params;
	}
}


?>