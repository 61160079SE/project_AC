<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include dirname(__FILE__) . '/../AC_Controller.php';

class Login extends AC_Controller
{

    /*=====  contructor  ======*/

    /*
     * __construct
     * -
     * @input -
     * @output -
     * @author 61160079 Adithep Phompha
     * @Create Date 2563-12-11
     */

    public function __construct()
    {
        parent::__construct();

    } //__construct

    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  เรียกหน้า view  ======*/

    /*
     * show_login
     * ใช้เรียกหน้าจอเข้าสู่ระบบ
     * @input -
     * @output หน้าจอเข้าสู่ระบบ
     * @author 61160082 Areerat Pongurai
     * @Create Date 2564-03-04
     */

    public function show_login()
    {

        $this->output_mk($this->config->item('ac_v_user_folder') . "v_login");

    } // show_login

    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  ajax  ======*/

    /*
     * check_login_ajax
     * ใช้ ckeck เข้าสู่ระบบ
     * @input -
     * @output เข้าสู่ระบบได้หรือไม่ได้
     * @author 61160082 Areerat Pongurai
     * @Create Date 2564-03-04
     */

    public function check_login_ajax()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_user', 'mu');
        $this->mu->us_name = $this->input->post('us_name');
        $this->mu->us_pass = $this->input->post('us_pass');
        $msg = 0;
        $data["user"] = $this->mu->get_check_login()->result();
        // print_r($data["user"]);
        // echo $data["user"][0]->us_name;
        if (empty($data["user"])) {
            $msg = 0;
        } else {
            $msg = 1;
            $this->add_session($data["user"][0]->us_id, $data["user"][0]->us_name);
        }
        echo json_encode($msg);
    } // check_login_ajax

    // =====================================================================================================================
    // =====================================================================================================================

} //end class Login