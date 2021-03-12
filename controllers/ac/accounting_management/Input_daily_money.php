<?php
/*
 * Input_daily_money
 * controller จัดการข้อมูลทางบัญชี
 * @author 61160195 Supanut Witchatanon
 * @Create Date 2564-03-02
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include dirname(__FILE__) . '/../AC_Controller.php';

class Input_daily_money extends AC_Controller
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
    } // __construct

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  เรียกหน้า view  ======*/
    /*
     * show_input_daily_money
     * ใช้เรียกหน้าจอเมนูข้อมูลพื้นฐาน
     * @input -
     * @output หน้าจอเมนูหมวดเงิน
     * @author 61160195 Supanut Witchatanon
     * @Create Date 2564-03-02
     */
    public function show_input_daily_money()
    {
        $this->output_md($this->config->item('ac_v_accounting_folder') . 'v_input_daily_money');
    } // show_input_daily_money

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    public function check_date_exit_ajax()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_daily_money', 'mlm');
        $this->mlm->dm_date = $this->input->post('date');
        $data['date'] = $this->mlm->check()->result();
        if (empty($data['date'])) {
            $data['date'] = "no_data";
        }
        echo json_encode($data);
    }

    /*=====  ajax  ======*/

    /*
     * get_list_money_ajax
     * ดึงข้อมูลรายการเงินเข้า list dropdown
     * @input -
     * @output รายการเงินที่เคยถูกเลือกไว้
     * @author 61160082 Areerat Pongurai
     * @Create Date 2564-03-03
     */

    public function get_list_money_ajax()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_list_money', 'mlm');
        $this->mlm->lm_us_id = $this->input->post('user_id');
        $this->mlm->lm_date = $this->input->post('date');
        $this->mlm->lm_mt_id = 1;
        $data["income"] = $this->mlm->get_by_date()->result();
        $this->mlm->lm_mt_id = 2;
        $data["expense"] = $this->mlm->get_by_date()->result();
        if (empty($data["income"])) {
            $data["income"] = "no_data";
        }
        if (empty($data["expense"])) {
            $data["expense"] = "no_data";
        }
        echo json_encode($data);
    } // get_list_money

    /*
     * get_list_dropdown_ajax
     * ดึงข้อมูลรายการเงิน dropdown
     * @input -
     * @output รายการเงินใน dropdown
     * @author 61160082 Areerat Pongurai
     * @Create Date 2564-03-03
     */

    public function get_list_dropdown_ajax()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_list_money', 'mlm');
        $this->mlm->bc_us_id = $this->input->post('user_id');
        $this->mlm->bc_mt_id = 1;
        $data["income"] = $this->mlm->get_by_user_id()->result();
        $this->mlm->bc_mt_id = 2;
        $data["expense"] = $this->mlm->get_by_user_id()->result();
        if (empty($data["income"])) {
            $data["income"] = "no_data";
        }
        if (empty($data["expense"])) {
            $data["expense"] = "no_data";
        }
        echo json_encode($data);
    } // get_list_dropdown_ajax

} //end class Input_daily_money