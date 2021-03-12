<?php
/*
 * Year_summary
 * controller รายงานผลสรุปปีงบประมาณ
 * @author 61160079 Adithep Phompha
 * @Create Date 2563-12-11
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include dirname(__FILE__) . '/../AC_Controller.php';

class Year_summary extends AC_Controller
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
     * show_Year_summary
     * ใช้เรียกหน้าจอรายงานผลสรุปรายปี
     * @input -
     * @output หน้าจอรายงานผลสรุปรายปี
     * @author 61160195 Supanut Witchatanon
     * @Create Date 2564-03-02
     */

    public function show_year_summary()
    {
        $this->output_md($this->config->item('ac_v_report_folder') . "v_year_summary");
    } // show_year_summary

    /*
     * get_year_money_ajax
     * ดึงข้อมูลรายการเงินรายปี
     * @input -
     * @output ข้อมูลรายการเงินรายปี
     * @author 60160341 Preeyanut Boonmeemak
     * @Create Date 2564-03-02
     */

    public function get_year_money_ajax()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_daily_money', 'mdm');
        $this->mdm->dm_us_id = $this->input->post('user_id');
        $data["year_money"] = $this->mdm->get_by_year()->result();

        echo json_encode($data);
    } // get_year_money_ajax

} //end class Year_summary