<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Ticket extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function index_get($id="")
    {
        $cekdata = $this->db->get_where('ticket_tooling', ['ticket_no' => $id])->row_array();
        if($id)
        {
            $data = $this->db->get_where('ticket_tooling', ['ticket_no' => $id])->row_array();
            $this->response($data, RestController::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'Data Tidak Ditemukan'
            ], 404);
        }
        $data = $this->db->get('ticket_tooling')->result();

        $this->response($data, RestController::HTTP_OK);
    }
}