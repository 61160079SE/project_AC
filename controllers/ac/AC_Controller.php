<?php


if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include 'application/controllers/Main_Controller.php';

class AC_controller extends Main_Controller
{
    /*=====  contructor  ======*/


    public function __construct()
    {
        parent::__construct();
        $this->config->load('ac_config');

    } // __construct

    // Calling View with "Material Dashboard" template
    public function output_md($view, $data = null)
    {
        $this->load->view('template/material_dashboard/header');
        $this->load->view('template/material_dashboard/ac_header');
        $this->load->view('template/material_dashboard/javascript');
        $this->load->view($view, $data);
        $this->load->view('template/material_dashboard/footer');
    }

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  index  ======*/

    public function index()
    {
        $this->show_homepage();
        // $this->load->model('ac/AC_Model', 'mam');
        // print_r($this->mam->get_all()->result());
    } // index

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  หน้าแรกของระบบ  ======*/

    public function show_homepage()
    {

        $this->output_md($this->config->item('ac_v_folder') . "v_homepage");

    } //show_homepage

} //end class Account_controller