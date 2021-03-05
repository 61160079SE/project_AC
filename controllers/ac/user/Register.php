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
     * ใช้เรียกหน้าจอรายงานผลสรุปปีงบประมาณ
     * @input -
     * @output หน้าจอรายงานผลสรุปปีงบประมาณ
     * @author 61160194 Wuttichai Chaiwanna
     * @Create Date 2563-11-24
     */

    public function show_register()
    {
        $this->output_mk("ac/user/v_register");


    } // show_daily_detial

       public function check()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'Da_ac_user', 'mau'); 
            $this->mau->us_name = $this->input->post('us_name'); 
            $this->mau->us_pass = $this->input->post('us_pass'); 
            $this->mau->us_email = $this->input->post('us_email');       
             $found = $this->mau->check_if_us_name_exist()->row()->exist;
             if($found > 0 ){
                $data['insert_status'] = 'fail';
             }else{
                $this->mau->insert();
                $data['insert_status'] = 'success';
             }
           
        echo json_encode($data);
           
    }

    public function show_all()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'Da_ac_user', 'mau'); 
        $found = $this->mau->get_all()->result();
        print_r($found);


    } 

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  ajax  ======*/

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================
} //end class Daily_detail