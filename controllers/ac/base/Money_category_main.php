<?php
/*
 * Money_category_main
 * controller หลักในการจัดการหมวดเงิน
 * @author 61160079 Adithep Phompha
 * @Create Date 2563-11-16
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include dirname(__FILE__) . '/../AC_Controller.php';

class Money_category_main extends AC_Controller
{
    /*=====  contructor  ======*/

    /*
     * __construct
     * -
     * @input -
     * @output -
     * @author 61160079 Adithep Phompha
     * @Create Date 2563-11-16
     */

    public function __construct()
    {
        parent::__construct();
    }

    // ==============================================================================================================
    // ==============================================================================================================
    // ==============================================================================================================

    /*=====  เรียกหน้า view  ======*/

    /*
     * show_money_category_menu
     * ใช้เรียกหน้าจอเมนูหมวดเงิน
     * @input -
     * @output หน้าจอเมนูหมวดเงิน
     * @author 61160079 Adithep Phompha
     * @Create Date 2563-11-16
     */

    public function show_money_category_menu()
    {
        $this->output_md($this->config->item('ac_v_base_folder') . "show_money_category_menu");
    } // show_money_category_menu

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  ajax  ======*/

} //end class Money_category_main