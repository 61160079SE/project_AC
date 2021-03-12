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
        error_reporting(0); // ยกเลิกการแสดง error บนหน้าจอ แต่ถ้า inspect ดูก็จะเจอ
    }

    public function __destruct()
    {
        $this->remove_session();
    } //__destruct

    // =====================================================================================================================
    // =====================================================================================================================

    // default
    public function index()
    {
        echo "<div style = 'text-align:center; transform: translate(-50%, -50%); position: fixed; top: 50%; left: 50%'>";
        echo "<h1> Main controller (^ ^)/ </h1>";
        echo "</div>";
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

    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  session  ======*/

    /*
     * add_session
     * session ผู้ใช้งานหลังจากเข้าสู่ระบบ
     * @input -
     * @output session
     * @author 61160082 Areerat Pongurai
     * @Create Date 2564-03-05
     */

    public function add_session($id, $name)
    {
        $this->session->set_userdata("us_id", $id);
        $this->session->set_userdata("us_name", $name);
    } // add_session

    /*
     * get_session
     * ดึงข้อมูล session
     * @input -
     * @output ข้อมูล session
     * @author 61160082 Areerat Pongurai
     * @Create Date 2564-03-05
     */

    public function get_session()
    {
        $all_session_values = $this->session->all_userdata();
        print_r($all_session_values);
    } // get_session

    /*
     * remove_session
     * logout
     * @input -
     * @output เอาข้อมูล session ออก
     * @author 61160082 Areerat Pongurai
     * @Create Date 2564-03-05
     */

    public function remove_session()
    {
        //$this->session->unset_userdata("__ci_last_regenerate"); //เพิ่มมานะ เพราะตอน add_session มันเพิ่มมาอัตโนมัติ
        $this->session->unset_userdata("us_id");
        $this->session->unset_userdata("us_name");

        //$all_session_values = $this->session->all_userdata();
        // print_r($all_session_values);
    } // remove_session

    // =====================================================================================================================
    // =====================================================================================================================

    public function test()
    {
        $this->output_mk('test.php');
    }
} //class Main_Controller