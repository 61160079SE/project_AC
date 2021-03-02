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
     * show_Year_summary
     * ใช้เรียกหน้าจอรายงานผลสรุปปีงบประมาณ
     * @input -
     * @output หน้าจอรายงานผลสรุปปีงบประมาณ
     * @author 61160194 Wuttichai Chaiwanna
     * @Create Date 2563-11-24
     */

    public function show_year_summary()
    {
        $this->output_md($this->config->item('ac_v_report_folder') . "v_year_summary");
    } // show_year_summary

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

} //end class Year_summary