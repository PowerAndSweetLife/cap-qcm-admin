<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Version extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("VersionModel", "version");
    }

    public function index()
    {
        $this->__auth();
        $this->load->view('admin/version', array(
            'version' => $this->version->getVersion(),
        ));
    }

    public function updateVersion()
    {
        $this->__auth();
        

        $this->version->alterVersion($this->input->post('version')) ;

        $this->load->view('admin/version', array(
            'version' => $this->version->getVersion(),
        ));
    }

    public function __auth()
    {
        if (!$this->session->userdata('connected')) {
            $this->load->view('login');
        }
    }
}
