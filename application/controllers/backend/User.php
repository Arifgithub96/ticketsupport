<?php if (!defined('BASEPATH')) { exit ('No Direct Script Allowed'); }

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
	    if(!$this->ion_auth->logged_in()){
	      redirect('auth/login', 'refresh');
	    }
	   	$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

		$this->load->model('m_user');
	}

	public function index()
	{
		check_permission_page(ID_GROUP,'read','#autorization');
		$this->admintemp->view('user/menu_user');
	}

	public function list_user()
	{
		check_permission_page(ID_GROUP,'read','user');
		$this->data['get_user']	= $this->m_user->get_users();
		// log_r($this->data['get_user']);
		$this->admintemp->view('user/list_user',$this->data);
	}

	public function create_user()
	{
		check_permission_page(ID_GROUP,'create','user');
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] 	= $identity_column;
		$this->data['get_dept'] 		= $this->m_user->get_group();
		$this->admintemp->view('user/create_user',$this->data);
	}

	public function save_user()
	{
		$employee_no		= $this->input->post('employee_no');
		$first_name			= $this->input->post('first_name');
		// $last_name			= $this->input->post('last_name');
		$id_group			= $this->input->post('id_group');
		$birthday 			= $this->input->post('birthday');
		$gender 			= $this->input->post('gender');
		$address 			= $this->input->post('address');
		$phone_no 			= $this->input->post('phone_no');
		$password 			= $this->input->post('password');
		$confirm_password 	= $this->input->post('confirm_password');
		$email 				= strtolower($this->input->post('email'));

		$chek_email_employee = $this->m_user->chek_email_employee($email);
		$chek_email = $this->m_user->check_email($email);
		if ($chek_email_employee == 0 && $chek_email == 0) {
			
			// $data_groups = $this->m_user->data_groups($group);
			// $group_name  = $data_groups->name;
			// $description = $data_groups->description;
			// $group_prod  = $data_groups->group_prod;
			$identity 	 = $email;//email
			
			$config['upload_path']      = './src/assets/images/profile/';
			$config['allowed_types']    = 'jpg|png|pdf|jpeg';
			$config['file_name']		= $_FILES['file_picture']['name'];
			$config['max_size']         = 2097152;
			$config['max_width']        = 19200;
			$config['max_height']       = 12800;

			$this->load->library('upload', $config);
	 		$this->upload->initialize($config);

	 		if ( ! $this->upload->do_upload('file_picture')){
			$error = array('error' => $this->upload->display_errors());

				$data = array(
					'id_group'		=> $id_group,
					'employee_no'	=> $employee_no,
					'name' 			=> $first_name." ".$last_name,
					'email'			=> $email,
					'gender'		=> $gender,
					'address'		=> $address,
					'birthday' 		=> $birthday
				);
				
				$id_uregister = $this->m_user->insert_employees($data);
				
				$additional_data = array(
					'active'			=> 1,
					'id_uregister'		=> $id_uregister,
					'username'			=> $email,
					'email'				=> $email,
					'employee_no'		=> $employee_no,
					'first_name' 		=> $first_name,
					'last_name' 		=> "",
					'company'			=> "PT GIH",
					'phone' 			=> $phone_no,
				);
				
				$id = $this->ion_auth->register($identity, $password, $email, $additional_data);
				$data_groups= array(
					'user_id'	=> $id,
					'group_id'	=> $id_group,
				);
				$this->m_user->insert_group($data_groups);
				$this->session->set_flashdata('success', 'User Data Has Been Added Successfully');
				redirect('backend/user/list_user');

			}else{
				$file_picture = $this->upload->data('file_name');
				
				$data = array(
					'id_group'		=> $id_group,
					'employee_no'	=> $employee_no,
					'name' 			=> $first_name." ".$last_name,
					'email'			=> $email,
					'gender'		=> $gender,
					'address'		=> $address,
					'birthday' 		=> $birthday,
					'file_picture'	=> $file_picture
				);
				
				$id_uregister = $this->m_user->insert_employees($data);
				
				$additional_data = array(
					'active'			=> 1,
					'id_uregister'		=> $id_uregister,
					'username'			=> $email,
					'email'				=> $email,
					'employee_no'		=> $employee_no,
					'first_name' 		=> $first_name,
					'last_name' 		=> "",
					'company'			=> "PT GIH",
					'phone' 			=> $phone_no,
				);

				$id = $this->ion_auth->register($identity, $password, $email, $additional_data);
				$data_groups = array(
					'user_id'	=> $id,
					'group_id'	=> $id_group,
				);
				$this->m_user->insert_group($data_groups);
				$this->session->set_flashdata('success', 'User Data Has Been Added Successfully');
				redirect('backend/user/list_user');
			}

		}else{
			echo $chek_email_employee;
			$this->session->set_flashdata('error', 'email is available, try another email !');
			redirect('backend/user/create_user');
		}
	}

	public function detail_user($id='')
	{
		check_permission_page(ID_GROUP,'read','user');
		$this->data['detail_user']	= $this->m_user->detail_users($id);
		// log_r($this->data['detail_user']);
		$this->admintemp->view('user/display',$this->data);
	}

	public function status_user_nonactive($id='')
	{
		check_permission_page(ID_GROUP,'update','user');
		$this->m_user->update_nonactive_user($id);
	}

	public function status_user_active($id='')
	{
		check_permission_page(ID_GROUP,'update','user');
		$this->m_user->update_active_user($id);
	}

	public function edit_user($id='')
	{
		check_permission_page(ID_GROUP,'update','user');
		$this->data['detail_user']	= $this->m_user->detail_users($id);
		$this->data['get_dept'] 	= $this->m_user->get_group();
		// log_r($this->data['detail_user'] );
		$this->admintemp->view('user/edit_user',$this->data);
	}

	public function save_edit_user()
	{
		$id 				= $this->input->post('id');
		$employee_no		= $this->input->post('employee_no');
		$first_name			= $this->input->post('first_name');
		// $last_name			= $this->input->post('last_name');
		$id_group			= $this->input->post('id_group');
		$birthday 			= $this->input->post('birthday');
		$gender 			= $this->input->post('gender');
		$address 			= $this->input->post('address');
		$phone_no 			= $this->input->post('phone_no');
		$password 			= $this->input->post('password');
		$confirm_password 	= $this->input->post('confirm_password');
		$email 				= strtolower($this->input->post('email'));

		$get_id_uregister 	= $this->m_user->get_id_uregister($id);
		$id_uregister 		= $get_id_uregister->id_uregister;
		// log_r($id_uregister);
		// $chek_email = $this->m_user->check_email($email);
		$chek_email_employee = $this->m_user->chek_email_employee_edit($employee_no, $email);
		// log_r($chek_email_employee->email);

		if (!empty($chek_email_employee->email)) {//Jika Email Tidak kosong
			
			// $data_groups = $this->m_user->data_groups($id_group);
			// $group_name  = $data_groups->name;
			// $description = $data_groups->description;
			// $group_prod  = $data_groups->group_prod;
			$identity 	 = $email;//email

			$config['upload_path']      = './src/assets/images/profile/';
			$config['allowed_types']    = 'jpg|png|pdf|jpeg';
			$config['file_name']		= $_FILES['file_picture']['name'];
			$config['max_size']         = 2097152;
			$config['max_width']        = 19200;
			$config['max_height']       = 12800;

			$this->load->library('upload', $config);
	 		$this->upload->initialize($config);

	 		if ( ! $this->upload->do_upload('file_picture')){//Jika Tidak Upload Photo
			$error = array('error' => $this->upload->display_errors());

				$data_employee = array(
					'employee_no'		=> $employee_no,
					'name' 				=> $first_name,
					'email'				=> $email,
					'id_group' 			=> $id_group,
					'gender'			=> $gender,
					'address'			=> $address,
					'birthday' 			=> $birthday
				);
				$this->m_user->update_employees($data_employee, $id_uregister);

				$data = array(
					'username'			=> $email,
					'email'				=> $email,
					'employee_no'		=> $employee_no,
					'first_name' 		=> $first_name,
					// 'last_name' 		=> $last_name,
					'company'			=> "PT GIH",
					'phone' 			=> $phone_no,
					'password'			=> $password
				);
				// log_r($id);
				// $id = $this->ion_auth->register($identity, $password, $email, $additional_data);
				$this->ion_auth->update($id, $data);
				$data_groups= array(
					'user_id'	=> $id,
					'group_id'	=> $id_group,
				);
				$this->m_user->update_group($id, $data_groups);
				$this->session->set_flashdata('success', 'Successfully Updated');
				redirect('backend/user/edit_user/'.$id);

			}else{//Jika Upload Photo
				$file_picture = $this->upload->data('file_name');
				
				$data_employee = array(
					'employee_no'		=> $employee_no,
					'name' 				=> $first_name." ".$last_name,
					'email'				=> $email,
					// 'dept' 				=> $group_name,
					// 'designation'		=> $description,
					'id_group'			=> $id_group,
					'gender'			=> $gender,
					'address'			=> $address,
					'file_picture'		=> $file_picture,
					'birthday' 			=> $birthday
				);
				
				$this->m_user->update_employees($data_employee, $id_uregister);

				$data = array(
					'username'			=> $email,
					'email'				=> $email,
					'employee_no'		=> $employee_no,
					'first_name' 		=> $first_name,
					// 'last_name' 		=> $last_name,
					'company'			=> "PT GIH",
					'phone' 			=> $phone_no,
					'password'			=> $password
				);
				// log_r($data);
				$this->ion_auth->update($id, $data);
				$data_groups = array(
					'user_id'	=> $id,
					'group_id'	=> $id_group,
				);
				$this->m_user->update_group($id, $data_groups);
				$this->session->set_flashdata('success', 'Successfully Updated');
				redirect('backend/user/edit_user/'.$id);
			}

		}else{//jika email kosong cek lagi apakah ada email sama
			$chek_email = $this->m_user->check_email($email);
			if ($chek_email == 0) {
				
				$data_groups = $this->m_user->data_groups($group);
				$group_name  = $data_groups->name;
				$description = $data_groups->description;
				$group_prod  = $data_groups->group_prod;
				$identity 	 = $email;//email

				$config['upload_path']      = './src/assets/images/profile/';
				$config['allowed_types']    = 'jpg|png|pdf|jpeg';
				$config['file_name']		= $_FILES['file_picture']['name'];
				$config['max_size']         = 2097152;
				$config['max_width']        = 19200;
				$config['max_height']       = 12800;

				$this->load->library('upload', $config);
		 		$this->upload->initialize($config);

		 		if ( ! $this->upload->do_upload('file_picture')){
				$error = array('error' => $this->upload->display_errors());

					$data_employee = array(
						'employee_no'		=> $employee_no,
						'name' 				=> $first_name." ".$last_name,
						'email'				=> $email,
						'dept' 				=> $group_name,
						'designation'		=> $description,
						'group_prod'		=> $group_prod,
						'gender'			=> $gender,
						'address'			=> $address,
						'birthday' 			=> $birthday
					);
					$this->m_user->update_employees($data_employee, $id_uregister);

					if ($this->input->post('password'))
					{
						$data['password'] = $this->input->post('password');
					}
					$data = array(
						'username'			=> $email,
						'email'				=> $email,
						'employee_no'		=> $employee_no,
						'first_name' 		=> $first_name,
						'last_name' 		=> $last_name,
						'company'			=> "PT GIH",
						'phone' 			=> $phone_no,
						'password'			=> $password
					);

					// $id = $this->ion_auth->register($identity, $password, $email, $additional_data);
					$this->ion_auth->update($id, $data);
					$data_groups= array(
						'user_id'	=> $id,
						'group_id'	=> $group,
					);
					$this->m_user->update_group($id, $data_groups);
					$this->session->set_flashdata('error', 'Data failed to update');
					redirect('backend/user/edit_user/'.$id);

				}else{
					$file_picture = $this->upload->data('file_name');
					
					$data_employee = array(
						'employee_no'		=> $employee_no,
						'name' 				=> $first_name." ".$last_name,
						'email'				=> $email,
						'dept' 				=> $group_name,
						'designation'		=> $description,
						'group_prod'		=> $group_prod,
						'gender'			=> $gender,
						'address'			=> $address,
						'file_picture'		=> $file_picture,
						'birthday' 			=> $birthday
					);
					
					$this->m_user->update_employees($data_employee, $id_uregister);
					if ($this->input->post('password'))
					{
						$data['password'] = $this->input->post('password');
					}
					$data = array(
						'username'			=> $email,
						'email'				=> $email,
						'employee_no'		=> $employee_no,
						'first_name' 		=> $first_name,
						'last_name' 		=> $last_name,
						'company'			=> "PT GIH",
						'phone' 			=> $phone_no,
						'password'			=> $password
					);

					$this->ion_auth->update($id, $data);
					$data_groups = array(
						'user_id'	=> $id,
						'group_id'	=> $group,
					);
					$this->m_user->update_group($id, $data_groups);
					$this->session->set_flashdata('error', 'Data failed to update');
					redirect('backend/user/edit_user/'.$id);
				}

			}elseif($chek_email == 1){
				$this->session->set_flashdata('error', 'email is available, try another email !');
				redirect('backend/user/edit_user/'.$id);
			}
		}
	}

	public function list_group()
	{
		check_permission_page(ID_GROUP,'read','group');
		$this->data['groups'] = $this->m_user->get_data_group();
		// log_r($data['groups']);
		$this->admintemp->view('user/list_group',$this->data);
	}

	public function create_group()
	{
		check_permission_page(ID_GROUP,'create','group');
		if ($this->input->post()) {
			$id_assigned_opt 	= $this->input->post('departement');
			$designation 		= $this->input->post('designation');
			$function 			= strtoupper($this->input->post('function'));
			$e_category			= strtoupper($this->input->post('e_category'));
			$e_group 			= strtoupper($this->input->post('e_group'));
			
			$get_dept_row 	 	= $this->m_user->get_data_dept_row($id_assigned_opt);
			// log_r($get_dept_row);
			$function_group 	= $get_dept_row->name."_".$function."_".$e_category."_".$e_group;
			
			$cek_id_group 	= strtolower($function_group);
			$cek_group 		= $this->m_user->check_group($cek_id_group);
			// log_r($cek_group);
			if ($cek_group == 0) {
				$data = array(
					'id_assigned_opt'	=> $id_assigned_opt,
					'name'				=> strtolower($function_group),
					'description'		=> $get_dept_row->name,
					'function'			=> $function,
					'e_category'		=> $e_category,
					'e_group' 			=> $e_group,
					'designation'		=> $designation,
					'group' 			=> $get_dept_row->name."-".$function."-".$e_category."-".$e_group,
				);
				// log_r($data);
				$this->m_user->insert_new_group($data);
				$this->session->set_flashdata('success', 'Group was successfully added !');
				redirect('backend/user/list_group');
			}else{
				$this->session->set_flashdata('error', 'Groups are available !');
				redirect('backend/user/create_group');
			}
			
		}
		$this->data['get_dept'] = $this->m_user->get_data_dept();
		$this->admintemp->view('user/create_group',$this->data);
	}

	public function edit_group($id='')
	{
		check_permission_page(ID_GROUP,'update','group');
		if ($this->input->post()) {
			$id 				= $this->input->post('id');
			$name 				= $this->input->post('name');
			$id_assigned_opt 	= $this->input->post('departement');
			$designation 		= $this->input->post('designation');
			$function 			= strtoupper($this->input->post('function'));
			$e_category			= strtoupper($this->input->post('e_category'));
			$e_group 			= strtoupper($this->input->post('e_group'));
			
			$get_dept_row 	 	= $this->m_user->get_data_dept_row($id_assigned_opt);
			$function_group 	= $get_dept_row->name."_".$function."_".$e_category."_".$e_group;
			$cek_id_group 		= strtolower($function_group);
			$cek_group 			= $this->m_user->check_update_group($cek_id_group);//cek group

			if ($cek_group == 0) {
				$data = array(
					'id_assigned_opt'	=> $id_assigned_opt,
					'name'				=> strtolower($function_group),
					'description'		=> $get_dept_row->name,
					'function'			=> $function,
					'e_category'		=> $e_category,
					'e_group' 			=> $e_group,
					'designation'		=> $designation,
					'group' 			=> $get_dept_row->name."-".$function."-".$e_category."-".$e_group,
				);
				// log_r($data);
				$this->m_user->update_group_row($data, $id);
				$this->session->set_flashdata('success', 'Updated group succesfully !');
				redirect('backend/user/edit_group/'.$id);
			}else{
				$this->session->set_flashdata('error', 'Groups are available !');
				redirect('backend/user/edit_group/'.$id);
			}
			
		}
		$this->data['id'] 			= $id;
		$this->data['get_group'] 	= $this->m_user->get_row_dept($id);
		$this->data['get_dept'] 	= $this->m_user->get_data_dept();
		$this->admintemp->view('user/edit_group',$this->data);
	}

	public function display_group($id='')
	{
		check_permission_page(ID_GROUP,'read','group');
		$this->data['get_group'] 	= $this->m_user->get_row_dept($id);
		$this->data['get_dept'] 	= $this->m_user->get_data_dept();
		$this->admintemp->view('user/display_group',$this->data);
	}

	public function autorization_view($id='')
	{
		check_permission_page(ID_GROUP,'update','group');
		$cekuserrole = $this->m_user->get_role_by_group_id($id)->num_rows();
		
		if($cekuserrole > 1){
			$menu = $this->m_user->get_data_menu_with_role($id)->result();
		} else {
			$menu = $this->m_user->get_data_menu($id)->result();
		}
		
		$this->data['menu'] 		= $menu;
		$this->data['usergroup'] 	= $this->m_user->get_group_by_id($id)->result();
		// log_r($this->data['usergroup']);
		$this->admintemp->view('user/autorization_menu',$this->data);
	}

	public function save_autorization()
	{
		$databaru = array();

		$id_group = $this->input->post('id_group');
		// log_r($id_group);
		$datamenu = $this->m_user->get_data_menu()->result();
		$cekuserrole = $this->m_user->get_role_by_group_id($id_group)->num_rows();
		if($cekuserrole > 1){
			$where = array('id_user_group' => $id_group);
			foreach ($datamenu as $dt) {		
				$p = $this->input->post('p'.$dt->id_menu.'[]');
				//$dt->id_menu." = ".json_encode($p)."</br>";
				$data = array(
					'id_user_group' => $id_group,
					'id_menu' => $dt->id_menu,
					'user_permission' => serialize($p),
				);

				$databaru[] = $data;
				
			}
			// log_r($databaru);
			if($this->m_user->delete_user_role('users_role',$where) AND $this->m_user->insert_role('users_role',$databaru)){
				$this->session->set_flashdata('success', 'User Role successfully saved');
				redirect('backend/user/autorization_view/'.$id_group);
			}else{
				$this->session->set_flashdata('error', 'User Role Failed to Save');
				redirect('backend/user/autorization_view/'.$id_group);
			}

		} else {
			foreach ($datamenu as $dt) {		
				$p = $this->input->post('p'.$dt->id_menu.'[]');
				//$dt->id_menu." = ".json_encode($p)."</br>";
				$data = array(
					'id_user_group' => $id_group,
					'id_menu' => $dt->id_menu,
					'user_permission' => serialize($p),
				);

				$databaru[] = $data;
			}
			// log_r($databaru);
			if($this->m_user->insert_role('users_role',$databaru)){
				$this->session->set_flashdata('success', 'User Role successfully saved');
				redirect('backend/user/autorization_view/'.$id_group);
			}else{
				$this->session->set_flashdata('error', 'User Role Failed to Save');
				redirect('backend/user/autorization_view/'.$id_group);
			}
		}

	}

	public function groups_status($id='')
	{
		check_permission_page(ID_GROUP,'update','group');
		$this->m_user->delete_group($id);
	}


	public function master_menu()
	{
		check_permission_page(ID_GROUP,'read','menu');
		$this->data['get_menu'] 	= $this->m_user->get_menu();
		$this->admintemp->view('user/list_menu',$this->data);
	}

	public function create_menu($id='')
	{
		check_permission_page(ID_GROUP,'create','menu');
		if ($id == 0) {
			$this->data['id'] = $id;
			$this->data['menu_parent'] = $this->m_user->get_parent_menu($id)->result();
			// log_r($this->data['menu_parent']);
			$this->admintemp->view('user/create_menu', $this->data);
		}elseif ($id == 1) {
			$this->data['id'] = $id;
			$this->data['menu_parent'] = $this->m_user->get_parent_menu($id)->result();
			// log_r($this->data['menu_parent']);
			$this->admintemp->view('user/create_menu', $this->data);
		}elseif ($id == 2) {
			$this->data['id'] = $id;
			$this->data['menu_parent'] = $this->m_user->get_parent_menu($id)->result();
			// log_r($this->data['menu_parent']);
			$this->admintemp->view('user/create_menu', $this->data);
		}elseif ($id == 3) {
			$this->data['id'] = $id;
			$this->data['menu_parent'] = $this->m_user->get_parent_menu($id)->result();
			// log_r($this->data['menu_parent']);
			$this->admintemp->view('user/create_menu', $this->data);
		}	
	}

	public function save_menu()
	{
		$menu_level = $this->input->post('menu_level');
      	$posisi = ($this->m_user->get_posisi_sortable()->row()->posisi)+1;
      
      	if($menu_level == 0){
	        $menu_name  = $this->input->post('menu_name');
	        $data = array(
	          'menu_name'     => strtoupper($menu_name),
	          'menu_url'      => '#',
	          'menu_level'    => $menu_level,
	          'menu_sortable' => $posisi, 
	        );

        $query = $this->m_user->add_new_menu($data,'menu');
        $this->session->set_flashdata('success', 'Menu Successfully Added');
        redirect('backend/user/master_menu');

      	}else if($menu_level == 1  OR $menu_level == 2 OR $menu_level == 3){
	        $menu_name    = $this->input->post('menu_name');
	        $menu_parent  = $this->input->post('menu_parent');
	        $menu_url     = $this->input->post('menu_url');
	        $menu_icon    = "&#x".$this->input->post('menu_icon').";";

	        $data = array(
	          'menu_name'     => $menu_name,
	          'menu_icon'     => $menu_icon,
	          'menu_url'      => $menu_url,
	          'menu_level'    => $menu_level,
	          'menu_parent'   => $menu_parent,
	          'menu_sortable' => $posisi, 
	        );

        $query = $this->m_user->add_new_menu($data,'menu');
        $this->session->set_flashdata('success', 'Menu Successfully Added');
        redirect('backend/user/master_menu');
      }
	}

	public function detail_menu($id_menu)
	{	
		check_permission_page(ID_GROUP,'read','menu');
		$id = $id_menu;
		$this->data['get_detail_menu'] 	= $this->m_user->get_detail_menu($id_menu);
		$this->data['menu_parent'] 		= $this->m_user->get_parent_menu($id)->result();
		$this->data['id'] 				= $id;
		// log_r($this->data['get_detail_menu']);
		$this->admintemp->view('user/display_menu',$this->data);
	}

	public function edit_menu($id_menu)
	{
		check_permission_page(ID_GROUP,'update','menu');
		$data_row_menu 	= $this->m_user->get_detail_menu($id_menu);
		$id = $id_menu;
		$this->data['menu_nul'] 		= $this->m_user->get_menu_level(0)->result();
		$this->data['menu_satu'] 		= $this->m_user->get_menu_level(1)->result();
		$this->data['menu_dua'] 		= $this->m_user->get_menu_level(2)->result();
		$this->data['id'] 				= $data_row_menu->menu_level;
		$this->data['get_detail_menu'] 	= $data_row_menu;
		// log_r($this->data['menu_parent']);
		$this->data['id_menu'] 			= $id;
		$this->admintemp->view('user/edit_menu',$this->data);
	}

	public function save_edit_menu()
	{
		$id_menu 		= $this->input->post("id_menu");
		$menu_name 		= $this->input->post("menu_name");
		$menu_url 		= $this->input->post("menu_url");
		$menu_parent 	= $this->input->post("menu_parent");

		if (!empty($menu_url)) {
			$url = $menu_url;
		}else{
			$url = "#";
		}

		$data = array(
			'menu_name' 	=> $menu_name,
			'menu_url' 		=> $url,
			'menu_parent' 	=> $menu_parent,
		);
		// log_r($id_menu);
		$this->m_user->update_menu($data, $id_menu);
		$this->session->set_flashdata('success', 'Menu Successfully Update');
		redirect('backend/user/edit_menu/'.$id_menu);

	}

	public function delete_menu($id='')
	{
		$this->m_user->delete_data_menu($id);
	}

	public function profil_user()
	{
		// log_r(USER_ID);
		$this->data['detail_user']	= $this->m_user->detail_users(USER_ID);
		$this->data['get_dept'] 	= $this->m_user->get_group();
		// log_r($this->data['detail_user'] );
		$this->admintemp->view('user/profil_user',$this->data);
	}

	public function save_profil_user()
	{
		$id 				= USER_ID;
		$password 			= $this->input->post('password');
		$confirm_password 	= $this->input->post('confirm_password');

		$get_id_uregister 	= $this->m_user->get_id_uregister($id);
		$id_uregister 		= $get_id_uregister->id_uregister;

		$config['upload_path']      = './src/assets/images/profile/';
		$config['allowed_types']    = 'jpg|png|pdf|jpeg';
		$config['file_name']		= $_FILES['file_picture']['name'];
		$config['max_size']         = 2097152;
		$config['max_width']        = 19200;
		$config['max_height']       = 12800;

		$this->load->library('upload', $config);
	 	$this->upload->initialize($config);

	 	if ( ! $this->upload->do_upload('file_picture')){//Jika Tidak Upload Photo
			$error = array('error' => $this->upload->display_errors());
			if (!empty($password)) {
				$data = array(
				'password'			=> $password
				);
				$this->ion_auth->update($id, $data);

				$this->session->set_flashdata('success', 'Successfully Updated');
				redirect('backend/user/profil_user');
			}else{
				redirect('backend/user/profil_user');
			}
			

		}else{//Jika Upload Photo
			$file_picture = $this->upload->data('file_name');
				
			$data_employee = array(
				'file_picture'	=> $file_picture,
			);
				
			$this->m_user->update_employees($data_employee, $id_uregister);

			if (!empty($password)) {
				$data = array(
					'password'	=> $password
				);
				$this->ion_auth->update($id, $data);

				$this->session->set_flashdata('success', 'Successfully Updated');
				redirect('backend/user/profil_user');
			}else{
				$this->session->set_flashdata('success', 'Successfully Updated');
				redirect('backend/user/profil_user');
			}
		}
	}

}
