<?php
/*
 * Daily_detail
 * controller รายงานผลสรุปปีงบประมาณ
 * @author 61160079 Adithep Phompha
 * @Create Date 2563-12-11
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include dirname(__FILE__) . '/../AC_Controller.php';

class Daily_detail extends AC_Controller
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
     * show_daily_detial
     * ใช้เรียกหน้าจอรายงานผลสรุปปีงบประมาณ
     * @input -
     * @output หน้าจอรายงานผลสรุปปีงบประมาณ
     * @author 61160194 Wuttichai Chaiwanna
     * @Create Date 2563-11-24
     */

    public function show_daily_detail()
    {
        $this->output_md($this->config->item('ac_v_report_folder') . "v_daily_detial");
    } // show_daily_detial

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  ajax  ======*/

    /*
     * get_list_money_ajax
     * ดึงข้อมูลรายการเงิน
     * @input -
     * @output หน้าจอแสดงรายละเอียดรายวัน
     * @author 61160173 Jirawat Yuenkaew
     * @Create Date 2564-03-02
     */

    public function get_list_money_ajax()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_list_money', 'mlm');
        $this->mlm->lm_us_id = $this->input->post('user_id'); 
        $this->mlm->lm_date = $this->input->post('date'); 
        $this->mlm->lm_mt_id  = 1 ;
        $data["income"]=$this->mlm->get_by_date()->result();
        $this->mlm->lm_mt_id  = 2 ;
        $data["expense"]=$this->mlm->get_by_date()->result();
        if(empty($data["income"])){
            $data["income"]= "no_data";
        }
        if(empty($data["expense"])){
            $data["expense"]= "no_data";
        }
        echo json_encode($data);
    } // get_list_money

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================
} //end class Daily_detail