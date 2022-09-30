<?php if (!defined('BASEPATH')) { exit ('No Direct Script Allowed'); }

class Tooling extends CI_Controller {

	public function __construct(){
		parent::__construct();
	    if(!$this->ion_auth->logged_in()){
	      redirect('auth/login', 'refresh');
	    }
	    // $this->load->model('m_masterdata');
	    $this->load->model('m_ticket_tool');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('mailer');
        $this->load->helper('download');
        $this->load->library('curl');
        $this->load->helper("telegram");
	}

	public function index()
	{
        $this->data['get_data']     = $this->m_ticket_tool->get_data();
		$this->admintemp->view('backend/tooling/tooling', $this->data);
	}
	
    public function create()
    {
        if($this->input->post()){
            $user_id    = $this->input->post('user_id');
            $title      = $this->input->post('title');
            $priority   = $this->input->post('priority');
            $problem    = $this->input->post('problem');
            $feedback   = $this->input->post('feedback');
            $attachment = $this->input->post('attachment');

            $config['upload_path']      = './src/assets/images/attachment/';
            $config['allowed_types']    = 'jpg|png|pdf|jpeg';
            $config['file_name']		= $_FILES['attachment']['name'];
            $config['max_size']         = 2097152;
            $config['max_width']        = 19200;
            $config['max_height']       = 12800;

            $this->load->library('upload', $config);
 		    $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('attachment')){
                $error = array('error' => $this->upload->display_errors());
                $attachment =null;
            }else{
                $attachment = $this->upload->data('file_name');
            }

            if ($priority == "Critical") {
                $expected_date = date('Y-m-d H:i:s', time() + (60 * 60 * 24));//critical 1 day
            }elseif($priority == "High"){
                $expected_date = date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 3));//high 3 days
            }elseif ($priority == "Medium") {
                $expected_date = date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 7));//medium 7 days
            }elseif ($priority == "Low") {
                $expected_date = date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 14));//low 14 days
            }

            $i = 1;
            do 
            {
                $date_create = date('Y-m-d H:i:s');

                $y = substr($date_create,2,2);//tahun 
                $m = substr($date_create,5,2);//bulan
                $d = substr($date_create,8,2);//hari
                $h = substr($date_create,11,2);//jam
                $i = substr($date_create,14,2);//menit
                $s = substr($date_create,17,2);//detik
                
                $ticket_no = "T".$y."".$m."".$d."".$h."".$i."".$s;
                $chek_ticket = $this->m_ticket_tool->check_noticket($ticket_no);
                // log_r($reported_time."  ".$i);
                $i++;
            } while($chek_ticket > 0);

            $data = array(
                'status'        => 1,//Open
                'ticket_no'     => $ticket_no,
                'id_request'    => $user_id,
                'title'         => $title,
                'date_create'   => $date_create,
                'problem'       => $problem,
                'attachment'    => $attachment,
                'priority'      => $priority,
                'feedback'      => $feedback,
                'expected_date' => $expected_date
            );
            // log_r($data);
            $status = $this->m_ticket_tool->insert_ticket($data);
            // $status =1;
            if($status == 1)
            { 
                $this->mail_create($data); 
            }else{//error insert db
                $this->session->set_flashdata('error', 'upload data error please try again !');
                redirect('backend/tooling');
            }

        }else{
            $hariIni     = new DateTime();
            $date_create = $hariIni->format('d F Y, H:i');
            $this->data['date_create'] 	    = $date_create;
            $this->data['get_user'] 		= $this->m_ticket_tool->get_user();
            // log_r($this->data['get_user']);
            $this->admintemp->view('backend/tooling/create', $this->data);
        }
    }

    function mail_create($data='')//send email new ticket
    {
        $id_request = $data['id_request'];
	    $get_req    = $this->m_ticket_tool->get_user_row($id_request);//get requestor id
		$email_req  = $get_req->email;
		$this->data['name_req']  =  $get_req->first_name;
		$this->data['desc_req']  =  $get_req->description;

		$get_to   = $this->m_ticket_tool->get_user_row(2);//get to id
		$email_to = $get_to->email;
		$this->data['name_to']  =  $get_to->first_name;
		$this->data['desc_to']  =  $get_to->description;

		// $email_penerima 			= "arif@asiagalaxy.com";
		$subjek 					= "Ticket Support Tooling";
		$this->data['ticket_no'] 	= $data['ticket_no'];
        $this->data['title'] 	    = $data['title'];
		$this->data['problem'] 	    = $data['problem'];
		$this->data['priority'] 	= $data['priority'];
		$this->data['feedback'] 	= $data['feedback'];
        $this->data['date_create'] 	= $data['date_create'];
		
		$content = $this->load->view('backend/tooling/mail_create', $this->data, true);//view email
		$mailto = array(	
			'penerima_satu' => $email_to,
		);

        $ccmail = array(	
			'cc_satu' => $email_req,
		);

		$sendmail = array(
			'email_penerima' => "",
			'subjek'  => $subjek,
			'content' => $content,
		);

		$send = $this->mailer->send($sendmail, $mailto, $ccmail); // jalankan fungsi php mailer
		$status = $send['status'];
		if ($status == 'Sukses') {
			$this->session->set_flashdata('success', 'Sending email was successful !');
			redirect('backend/tooling');
		}elseif($status == 'Gagal'){
			$this->session->set_flashdata('error', 'Sending email failed !');
			redirect('backend/tooling');
		}
    }

    public function acceptance($id='')
    {
        if($this->input->post()){
            $ticket_no  = $this->input->post('ticket_no');
            $status     = $this->input->post('status');
            $reject     = $this->input->post('reason_reject');
            if($status == 2){ $reason_reject = null; }elseif($status == 3){ $reason_reject = $reject; }
            $data = array(
                'status'        => $status,
                'reason_reject' => $reason_reject
            );
            $this->m_ticket_tool->update_status($data, $ticket_no);
            $this->session->set_flashdata('success', 'Ticket Acceptance !');
			redirect('backend/tooling');
        }else{
            $hariIni     = new DateTime();
            $date_create = $hariIni->format('d F Y, H:i');
            $this->data['date_create'] 	    = $date_create;
            $this->data['get_user'] 		= $this->m_ticket_tool->get_user();

            $this->data['get_row_ticket'] = $this->m_ticket_tool->m_row_ticket($id);//id = ticket_no
            // log_r($this->data['get_row_ticket']);
            $this->admintemp->view('backend/tooling/accept', $this->data);
        }
    }
	
    public function progress($id=''){
        if($this->input->post()){
            $ticket_no          = $this->input->post('ticket_no');
            $action             = $this->input->post('action');
            $date_progress      = $this->input->post('date_progress');
            $progress           = $this->input->post('progress');
            $date_discuss       = $this->input->post('date_discuss');
            $message            = $this->input->post('message');
            $closed             = $this->input->post('closed');
            if($action == "discussion"){//perlu diskusi dulu*
                $status = 6;//Discussion
                $discuss_date = $date_discuss;
                $progress_date = null;
            }elseif($action == "On-Progress"){
                $status = 4;//On-Progress
                $progress_date = $date_progress;
                if(empty($date_discuss)){ $discuss_date = null; }else{ $discuss_date = $date_discuss; }
            }
            if($closed == "5"){
                $status      = $closed;
                $closed_date = $date_progress;
            }else{ $closed_date = null; }
            $data = array(
                'status'         => $status,
                'action'         => $action,
                'date_progress'  => $progress_date,
                'progress'       => $progress,
                'date_discuss'   => $discuss_date,
                'message'        => $message,
                'date_closed'    => $closed_date
            );
            // log_r($data);
            // $this->m_ticket_tool->update_status($data, $ticket_no);
            if($status == 6) {
                $this->mail_discuss($data, $ticket_no);//send email harus discuss dulu*
            }elseif($status == 5){ $this->send_closed($data, $ticket_no); }
            $this->session->set_flashdata('success', 'ticket successfully updated !');
            redirect('backend/tooling/',$ticket_no);
        }else{
            $hariIni     = new DateTime();
            $date_create = $hariIni->format('d F Y, H:i');
            $this->data['date_create'] 	    = $date_create;
            $this->data['get_user'] 		= $this->m_ticket_tool->get_user();
            
            $this->data['get_row_ticket'] = $this->m_ticket_tool->m_row_ticket($id);//id = ticket_no
            $this->data['date_discuss'] = strftime('%Y-%m-%dT%H:%M:%S', strtotime($this->data['get_row_ticket']->date_discuss));
            $this->data['date_progress'] = strftime('%Y-%m-%dT%H:%M:%S', strtotime($this->data['get_row_ticket']->date_progress));
            // log_r($this->data['date_discuss']);
            $this->admintemp->view('backend/tooling/onprogress', $this->data);
        }
    }

    ## Send Email Discuss ##
    function mail_discuss($data='', $ticket_no='')//send email new ticket
    {   
        $this->data['date_discuss']    = date('d F Y', strtotime($data['date_discuss']));
        $this->data['message']         = $data['message'];
        $data_ticket = $this->m_ticket_tool->m_row_ticket($ticket_no);//id = ticket_no
        $id_request  = $data_ticket->id_request;
	    $get_req     = $this->m_ticket_tool->get_user_row($id_request);//get requestor id
		$email_req   = $get_req->email;
		$this->data['name_req']  =  $get_req->first_name;
		$this->data['desc_req']  =  $get_req->description;

		$get_admin      = $this->m_ticket_tool->get_user_row(2);//Action From Admin
		$email_admin    = $get_admin->email;
		$this->data['name_admin']  =  $get_admin->first_name;
		$this->data['desc_admin']  =  $get_admin->description;

		$subjek 					= "Discussion Ticket Support Machine";
		$this->data['ticket_no'] 	= $ticket_no;
        $this->data['title'] 	    = $data_ticket->title;
		$this->data['problem'] 	    = $data_ticket->problem;
		$this->data['priority'] 	= $data_ticket->priority;
		$this->data['feedback'] 	= $data_ticket->feedback;
		
		$content = $this->load->view('backend/tooling/mail_discussion', $this->data, true);//view email
        log_r($content);
		$mailto = array(
			'penerima_satu' => $email_req,//email_req
		);

        $ccmail = array(	
			'cc_satu' => $email_admin,
		);

		$sendmail = array(
			'email_penerima' => "",
			'subjek'  => $subjek,
			'content' => $content,
		);
		$send = $this->mailer->send($sendmail, $mailto, $ccmail); // jalankan fungsi php mailer
		$status = $send['status'];
		if ($status == 'Sukses') {
			$this->session->set_flashdata('success', 'Sending email was successful !');
			redirect('backend/tooling');
		}elseif($status == 'Gagal'){
			$this->session->set_flashdata('error', 'Sending email failed !');
			redirect('backend/tooling');
		}
    }

    ## Send Email Closed ##
    function send_closed($data='', $ticket_no='')
    {
        $data_ticket = $this->m_ticket_tool->m_row_ticket($ticket_no);//id = ticket_no
        $id_request  = $data_ticket->id_request;
	    $get_req     = $this->m_ticket_tool->get_user_row($id_request);//get requestor id
		$email_req   = $get_req->email;
		$this->data['name_req']  =  $get_req->first_name;
		$this->data['desc_req']  =  $get_req->description;

		$get_admin      = $this->m_ticket_tool->get_user_row(2);//Action From Admin
		$email_admin    = $get_admin->email;
		$this->data['name_admin']  =  $get_admin->first_name;
		$this->data['desc_admin']  =  $get_admin->description;

		$subjek 					= "Closed Ticket Support Machine";
		$this->data['ticket_no'] 	= $ticket_no;
        $this->data['title'] 	    = $data_ticket->title;
		$this->data['problem'] 	    = $data_ticket->problem;
		$this->data['priority'] 	= $data_ticket->priority;
		$this->data['feedback'] 	= $data_ticket->feedback;
        $this->data['date_closed'] 	= $data['date_closed'];
		
		$content = $this->load->view('backend/tooling/mail_closed', $this->data, true);//view email
		log_r($content);
        $mailto = array(	
			'penerima_satu' => $email_req,//email_req
		);

        $ccmail = array(	
			'cc_satu' => $email_admin,//admin
		);

		$sendmail = array(
			'email_penerima' => "",
			'subjek'  => $subjek,
			'content' => $content,
		);
		$send = $this->mailer->send($sendmail, $mailto, $ccmail); // jalankan fungsi php mailer
		$status = $send['status'];
		if ($status == 'Sukses') {
			$this->session->set_flashdata('success', 'Sending email was successful !');
			redirect('backend/tooling');
		}elseif($status == 'Gagal'){
			$this->session->set_flashdata('error', 'Sending email failed !');
			redirect('backend/tooling');
		}
    }

    public function download($attachment='')
    {
        $file = './src/assets/images/attachment/'.$attachment;
        force_download($file, NULL);
    }

    public function details_ticket($ticket_no)
    {
        $this->data['get_user'] 	  = $this->m_ticket_tool->get_user();
        $this->data['get_row_ticket'] = $this->m_ticket_tool->m_row_ticket($ticket_no);//id = ticket_no
        // log_r($this->data['get_row_ticket']);
        $this->data['date_discuss'] = strftime('%Y-%m-%dT%H:%M:%S', strtotime($this->data['get_row_ticket']->date_discuss));
        $this->data['date_progress'] = strftime('%Y-%m-%dT%H:%M:%S', strtotime($this->data['get_row_ticket']->date_progress));
        $this->admintemp->view('backend/tooling/detail_ticket', $this->data);
    }

    public function delete($id)
    {
        $this->m_ticket_tool->delete_tt_machine($id);
    }

    // function testbot()
    // {
    //     $emoticons = "\ud83d\udc4e";//jempol
    //     $x = "\xE2\x9D\x8C";//x   
    //     // $data['text'] =  "your text ".json_decode('"'.$emoticons.'"').' bla bla';
    //     $telegram_id  = 533910263;
    //     $message_text = "Tes emoji";
    //     $message_text .= "\ntes ".json_decode('"'.$x.'"').' hmm';
    //     $secret_token = '1808603997:AAG8isO7TpCQ718jWaZbGW6Zc7oMb6id-bw';
    //     $this->sendtes($telegram_id, $message_text, $secret_token, "html");
    // }

    // function sendtes($telegram_id, $message_text, $secret_token){
    //     // $bot_token  = $this->config->item("villa_bot");
    //     $telegram   = new Telegram($secret_token);
    //     $content    = array(
    //       'chat_id'       => $telegram_id,
    //       'text'          => $message_text,
    //       'parse_mode'    => 'html'
    //     );
    //     $telegram->sendMessage($content);
    // }

    // function sendMessage($telegram_id, $message_text, $secret_token)
    // {
    //     $url = "https://api.telegram.org/bot".$secret_token."/sendMessage?parse_mode=markdown&chat_id=".$telegram_id;
    //     $url = $url."&text=".base_url($message_text);
    //     $ch = curl_int();
    //     $optArray = array(
    //         CURLOPT_URL => $url,
    //         CURLOPT_RETURNTRANSFER => true
    //     );
    //     curl_setopt_array($ch, $optArray);
    //     $result = curl_exec($ch);
    //     $err = curl_error($ch);
    //     curl_close($ch);
    //     if($err){
    //         echo 'Pesan gagal'.$err;
    //     }else{
    //         echo 'Pesan Berhasil';
    //     }
    // }
}
