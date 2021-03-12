<?php
/*
 * Month_summary
 * controller สรุปผลรายเดือน
 * @author 61160182 Nawarut Nambunsri
 * @Create Date 2564-03-02
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include dirname(__FILE__) . '/../AC_Controller.php';

class Month_summary extends AC_Controller
{

    /*=====  contructor  ======*/

    /*
     * __construct
     * -
     * @input -
     * @output -
     * @author 61160195 Supanut Witchatanon
     * @Create Date 2564-03-02
     */

    public function __construct()
    {
        parent::__construct();
    } //__construct

    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  เรียกหน้า view  ======*/

    /*
     * show_month_summary
     * ใช้เรียกหน้าจอสรุปผลรายเดือน
     * @input -
     * @output หน้าจอสรุปผลรายเดือน
     * @author 61160195 Supanut Witchatanon
     * @Create Date 2564-03-02
     */

     /*
     * show_month_summary
     * ใช้เรียกหน้าจอสรุปผลรายเดือน
     * @input $year
     * @output หน้าจอสรุปผลรายเดือน
     * @author 61160082 Areerat Pongurai
     * @Update Date 2564-03-12
     */

    public function show_month_summary($year)
    {
        $data['year']=$year;
        $this->output_md($this->config->item('ac_v_report_folder') . "v_month_summary", $data);
    } // show_month_summary

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================
    /*=====  ajax  ======*/

    /*
     * get_month_money_ajax
     * ดึงข้อมูลรายการเงิน
     * @input -
     * @output หน้าจอแสดงรายละเอียดรายวัน
     * @author 61160182 Nawarut Nambunsri
     * @Create Date 2564-03-02
     */

    public function get_month_money_ajax()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_daily_money', 'mdm');
        $this->mdm->dm_us_id = $this->input->post('user_id');
        $this->mdm->year = $this->input->post('year');
        $data["month_money"] = $this->mdm->get_month()->result();

        echo json_encode($data);
    } // get_daily_money

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================
} //end class Month_summary