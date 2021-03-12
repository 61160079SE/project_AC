<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include dirname(__FILE__) . '/../AC_Controller.php';

class Register extends AC_Controller
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
     * show_register
     * ใช้เรียกหน้าจอลงทะเบียน
     * @input -
     * @output ใช้เรียกหน้าจอลงทะเบียน
     * @author 61160195 Supanut Witchatanon
     * @Create Date 2564-03-02
     */

    public function show_register()
    {
        $this->output_mk($this->config->item('ac_v_user_folder') . "v_register");
    } // show_register

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    // =====================================================================================================================
    // =====================================================================================================================

    /*
     * insert_user_ajax
     * บันทึกชื่อผู้ใช้
     * @input -
     * @output -
     * @author 61160065 Netipong Kaewin
     * @Create Date 2563-11-24
     */

    /*=====  ajax  ======*/

    public function insert_user_ajax()
    {

        $user = $this->input->post('us_name');
        $password = $this->input->post('us_pass');
        $email = $this->input->post('us_email');

        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_user', 'mu');
        $this->mu->us_name = $user;
        $this->mu->us_pass = $password;
        $this->mu->us_email = $email;
        $found = $this->mu->check_if_us_name_exist()->row()->exist;
        if ($found > 0) {
            $data['insert_status'] = 'fail';
        } else {
            $this->mu->insert();
            $data['insert_status'] = 'success';
            $this->add_session("0", $user);

        }

        echo json_encode($data);

    }

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================
} //end class Register