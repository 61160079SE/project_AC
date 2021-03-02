<?php
/*
 * Main_Controller.php
 * Controller หลักของระบบ
 * @author 61160079 Adithep Phompha
 * @Create Date 2564-02-13
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Main_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    // default
    public function index()
    {
        echo "<div style = 'text-align:center; transform: translate(-50%, -50%); position: fixed; top: 50%; left: 50%'>";
        echo "<h1> Main controller (^ ^)/ </h1>";
        echo "</div>";

        // $this->output_mk('skill_test/welcome');
    }

    // Calling View with "Material Dashboard" template
    public function output_md($view, $data = null)
    {
        $this->load->view('template/material_dashboard/header');
        $this->load->view('template/material_dashboard/javascript');
        $this->load->view($view, $data);
        $this->load->view('template/material_dashboard/footer');
    }

    // Calling View with "Material Kit" template
    public function output_mk($view, $data = null)
    {
        $this->load->view('template/material_kit/header');
        $this->load->view('template/material_kit/javascript');
        $this->load->view($view, $data);
        $this->load->view('template/material_kit/footer');
    }

    public function test()
    {
        $this->output_md('test.php');
    }
} //class Main_Controller