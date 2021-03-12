<?php
/*
 * Daily_summary
 * controller ผลสรุปรายวัน
 * @author 61160195 Supanut Witchatanon
 * @Create Date 2564-03-02
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include dirname(__FILE__) . '/../AC_Controller.php';

class Daily_summary extends AC_Controller
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
     * show_daily_summary
     * ใช้เรียกหน้าจอรายงานผลสรุปปีงบประมาณ
     * @input -
     * @output หน้าจอรายงานผลสรุปปีงบประมาณ
     * @author 61160195 Supanut Witchatanon
     * @Create Date 2564-03-02
     */

    /*
     * show_daily_summary
     * ใช้เรียกหน้าจอรายงานผลสรุปปีงบประมาณ
     * @input $year, $month
     * @output หน้าจอรายงานผลสรุปปีงบประมาณ
     * @author 61160082 Areerat Pongurai
     * @Update Date 2564-03-12
     */

    public function show_daily_summary($year, $month)
    {
        $data['year'] = $year;
        $data['month'] = $month;
        $this->output_md($this->config->item('ac_v_report_folder') . "v_daily_summary", $data);
    } // show_daily_summary

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================
    /*
     * get_daily_money_ajax
     * ดึงข้อมูลรายการเงิน
     * @input -
     * @output หน้าจอแสดงรายละเอียดรายวัน
     * @author 61160077 Siripoon Yimthanom
     * @Create Date 2564-03-02
     */

    public function get_daily_money_ajax()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_daily_money', 'mdm');
        $this->mdm->dm_us_id = $this->input->post('user_id');
        $this->mdm->year = $this->input->post('year');
        $this->mdm->month = $this->input->post('month');

        $data["daily_money"] = $this->mdm->get_daily()->result();

        echo json_encode($data);
    } // get_daily_money_ajax

} //end class Daily_summary