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

    public function show_input_daily_money()
    {
        $this->output_md($this->config->item('ac_v_accounting_folder') . 'v_input_daily_money');
    } // show_input_daily_money

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    public function check_date_exist_ajax()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_daily_money', 'mlm');
        $this->mlm->dm_date = $this->input->post('date');
        $this->mlm->dm_us_id = $this->session->userdata("us_id");

        $found =$this->mlm->check_date_exist()->row()->exist; //0 = ไม่พบ, มากกว่า 0 = พบ

        if ($found == 0) {
            $data['json_date_exist'] = false;
        }else{
            $data['json_date_exist'] = true;
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
        $this->mlm->lm_us_id =$this->session->userdata("us_id");
        $this->mlm->lm_date = $this->input->post('date');
        $this->mlm->lm_mt_id = 1;
        $data["income"] = $this->mlm->get_by_date()->result();
        $this->mlm->lm_mt_id = 2;
        $data["expense"] = $this->mlm->get_by_date()->result();


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
         $this->load->model($this->config->item('ac_m_folder') . 'M_ac_money_category', "bbc");

        $this->bbc->bc_mt_id = 1; //1 = รายรับ
        $data["income"] = $this->bbc->get_by_type()->result();

        $this->bbc->bc_mt_id = 2; //2 = รายจ่าย
        $data["expense"] = $this->bbc->get_by_type()->result();
        if (empty($data["income"])) {
            $data["income"] = "no_data";
        }
        if (empty($data["expense"])) {
            $data["expense"] = "no_data";
        }

        echo json_encode($data);
    } // get_list_dropdown_ajax

    
    /*
     * save_data_ajax
     * บันทึกข้อมูล
     * @input -
     * @output รายการเงินใน dropdown
     * @author 61160082 Areerat Pongurai
     * @Create Date 2564-03-03
     */

    public function save_data_ajax()
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_list_money', 'mlm');


        $obj_list = $this->input->post('obj_list');
        $arr_delete = $this->input->post('arr_delete');


        for($i = 0; $i < count($arr_delete); $i++){
            $this->mlm->lm_id = $arr_delete[$i];
            $this->mlm->delete();
        }//for

        $arr_money_type = array("income", "expense");

        for($j = 0; $j < count($arr_money_type); $j++){

            $money_type = $arr_money_type[$j];

            for($i = 0; $i < count($obj_list[$money_type]); $i++){

                $lm_id = $obj_list[$money_type][$i]['lm_id'];

                $this->mlm->lm_date = $obj_list[$money_type][$i]['lm_date'];

                $this->mlm->lm_money = $obj_list[$money_type][$i]['lm_money'];
                $this->mlm->lm_us_id = $this->session->userdata("us_id");
                $this->mlm->lm_mt_id = $obj_list[$money_type][$i]['lm_mt_id'];


                if($obj_list[$money_type][$i]['lm_customize_category'] == "is_null"){
                    $this->mlm->lm_customize_category = null;
                }else{
                     $this->mlm->lm_customize_category = $obj_list[$money_type ][$i]['lm_customize_category'];
                }

                if($obj_list[$money_type][$i]['lm_bc_id'] == "is_null"){
                    $this->mlm->lm_bc_id = null;
                }else{
                     $this->mlm->lm_bc_id = $obj_list[$money_type ][$i]['lm_bc_id'];
                }


                if(strpos($lm_id, 'new_') !== false){
                    //insert
                    $this->mlm->insert();
                    // print_r('==insert=');
                    // print_r($obj_list[$money_type ][$i]['lm_customize_category']);
                    // print_r('|||');
                } else{
                    //update
                    $this->mlm->lm_id = $lm_id;
                    $this->mlm->update();
                    // print_r('==update=');
                    // print_r($obj_list[$money_type ][$i]['lm_customize_category']);
                    // print_r('|||');
                }

            }//for
            
        }//for

        $data['message'] = 'success';
        echo json_encode($data);
    } // get_list_dropdown_ajax




} //end class Input_daily_money