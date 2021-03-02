<?php
/*
 * Budget_year_management
 * controller จัดการข้อมูลทางบัญชี
 * @author 61160182 Nawarut Nambunsri
 * @Create Date 2563-07-18
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include dirname(__FILE__) . '/../AC_Controller.php';

class Budget_year_management extends AC_Controller
{
    /*=====  contructor  ======*/

    /*
     * __construct
     * -
     * @input -
     * @output -
     * @author 61160182 Nawarut Nambunsri
     * @Create Date 2563-07-18
     */

    public function __construct()
    {
        parent::__construct();
    } // __construct

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  เรียกหน้า view  ======*/


    public function show_budget_year_management()
    {
        $this->output_md($this->config->item('ac_v_accounting_folder') . 'show_budget_year_management');
    } // show_budget_year_management

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

} //end class Budget_year_management