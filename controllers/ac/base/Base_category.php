<?php
/*
 * Base_category
 * controller หลักในการจัดการหมวดเงิน
 * @author 61160194 Wuttichai Chaiwanna
 * @Create Date 2564-03-02
 */

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
} //if

include dirname(__FILE__) . '/../AC_Controller.php';

class Base_category extends AC_Controller
{
    /*=====  contructor  ======*/

    /*
     * __construct
     * -
     * @input -
     * @output -
     * @author 61160194 Wuttichai Chaiwanna
     * @Create Date 2564-03-02
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
     * show_base_category
     * ใช้เรียกหน้าจอเมนูข้อมูลพื้นฐาน
     * @input -
     * @output หน้าจอเมนูหมวดเงิน
     * @author 61160195 Supanut Witchatanon
     * @Create Date 2564-03-02
     */

    public function show_base_category()
    {
        $this->output_md($this->config->item('ac_v_base_folder') . "v_base_category");
    } // show_money_category_menu

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  ajax  ======*/

    /*
     * get_main_category_ajax
     * ดึงข้อมูลหมวดเงินหลัก
     * @input -
     * @output ข้อมูลหมวดเงินหลัก
     * @author 61160194 Wuttichai Chaiwanna
     * @Update Date 2564-03-05
     */

    public function get_main_category_ajax()
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
    }

    /*
     * insert_money_category_main_ajax
     * เพิ่มข้อมูลหมวดเงินหลัก
     * @input ข้อมูลหมวดเงินหลัก
     * @output ข้อความแจ้งเตือนบันทึกสำเร็จ
     * @author : 61160194 Wuttichai Chaiwanna
     * @Create Date  2564-03-05
     */

    public function insert_money_category_main_ajax()
    {
        $bc_name = $this->input->post('bc_name_m'); //ชื่อหมวดเงิน
        $bc_mt_id = $this->input->post('bc_mt_id'); //id ประเภทหมวดเงิน
        $bc_us_id = $this->input->post('bc_us_id');
        if ($this->check_if_category_name_exist($bc_name, $bc_mt_id) > 0) {
            //กรณีพบชื่อซ้ำ
            $data["json_data_exist"] = "Y";
            $data["json_message"] = "insert_money_category_main cancel";
        } //if
        else {
            //กรณีไม่พบชื่อซ้ำ
            $data["json_data_exist"] = "N";

            $this->load->model($this->config->item('ac_m_folder') . 'M_ac_money_category', "bbc");

            $this->bbc->bc_name = $this->input->post('bc_name_m'); //ชื่อหมวดเงิน
            $this->bbc->bc_mt_id = $this->input->post('bc_mt_id'); //id ประเภทหมวดเงิน
            $this->bbc->bc_us_id = $this->input->post('bc_us_id');
            $this->bbc->insert();

            $data["json_message"] = "insert_money_category_main success";
        } //else

        echo json_encode($data);
    } // insert_money_category_main_ajax

    /*=====  ตรวจสอบข้อมูลใน Database  ======*/

    /*
     * check_if_category_name_exist
     * ตรวจสอบว่าชื่อหมวดเงินที่ถูกส่งมาซ้ำกับชื่อหมวดเงินในฐานข้อมูลหรือไม่
     * @input ชื่อหมวดเงิน และประเภทหมวดเงิน
     * @output 0 หรือมากกว่า 0 (0 = ไม่มี, มากกว่า 0 = มี)
     * @author : 61160194 Wuttichai Chaiwanna
     * @Create Date  2564-03-05
     */

    public function check_if_category_name_exist($bc_name, $bc_mt_id)
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_money_category', "bbc");

        $this->bbc->bc_name = $bc_name;
        $this->bbc->bc_mt_id = $bc_mt_id;
        $found = (float) $this->bbc->check_if_name_exist()->row()->exist; //0 = ไม่มีชื่อซ้ำ, มากกว่า 0 = มีชื่อซ้ำ

        return $found;
    } // check_if_category_name_exist

    /*=====  ลบข้อมูลหมวดเงินหลัก  ======*/

    /*
     * delete_money_category_main_ajax
     * ลบข้อมูลหมวดเงินหลัก
     * @input id ของหมวดเงินหลัก และหมวดเงินย่อยที่อยู่ภายใต้หมวดเงินหลักนั้น
     * @output ข้อความแจ้งเตือนลบสำเร็จ
     * @author : 61160194 Wuttichai Chaiwanna
     * @Create Date  2564-03-05
     */

    public function delete_money_category_main_ajax()
    {
        $bc_id = $this->input->post('bc_id'); //ไอดีหมวดเงิน

        if ($this->check_if_category_already_use($bc_id) > 0) {
            //กรณีถูกใช้งานอยู่
            $data["json_data_exist"] = "Y";
            $data["json_message"] = "delete_money_category_main_ajax cancel";
        } //if
        else {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_money_category', "bbc");
        $this->bbc->bc_id = $this->input->post('bc_id');
        $this->bbc->delete();

        $data["json_message"] = "delete_money_category_main success";
        }//else
        echo json_encode($data);

    } // delete_money_category_main_ajax

    /*
     * check_if_category_already_use
     * ตรวจสอบว่าหมวดเงินที่ถูกส่งมาเคยถูกใช้งานอยู่หรือไม่
     * @input bc_id
     * @output 0 หรือมากกว่า 0 (0 = ไม่ได้ถูกใช้, มากกว่า 0 = ถูกใช้งานอยู่)
     * @author : 61160194 Wuttichai Chaiwanna
     * @Create Date  2564-03-05
     */

    public function check_if_category_already_use($bc_id)
    {
        $this->load->model($this->config->item('ac_m_folder') . 'M_ac_list_money', "bbcm");

        $this->bbcm->lm_bc_id = $bc_id;
        $found = (float) $this->bbcm->check_if_category_already_use()->row()->exist; //0 = หมวดเงินไม่ได้ถูกใช้, มากกว่า 0 = หมวดเงินถูกใช้งานอยู่

        return $found;
    } // check_if_category_already_use

    /*=====  แก้ไขข้อมูลหมวดเงินหลัก  ======*/

    /*
     * update_money_category_main_ajax
     * แก้ไขข้อมูลหมวดเงินหลัก
     * @input ข้อมูลหมวดเงินหลัก
     * @output ข้อความแจ้งเตือนแก้ไขสำเร็จ
     * @author : 61160194 Wuttichai Chaiwanna
     * @Create Date  2564-03-05
     */

    public function update_money_category_main_ajax()
    {
        $bc_name = $this->input->post('bc_name_edit'); //ชื่อหมวดเงิน
        $bc_mt_id = $this->input->post('bc_mt_id'); //ไอดีประเภทหมวดเงิน

        $new_name = $this->input->post('new_name'); // (Y = ใช้ชื่อเดิม, N =  มีการเปลี่ยนชื่อใหม่)

        if ($new_name == "Y" && $this->check_if_category_name_exist($bc_name, $bc_mt_id) > 0) {
            //กรณีพบชื่อซ้ำ
            $data["json_data_exist"] = "Y";
            $data["json_message"] = "update_money_category_main cancel";
        } //if
        else {
            //กรณีไม่พบชื่อซ้ำ
            $data["json_data_exist"] = "N";

            $this->load->model($this->config->item('ac_m_folder') . 'M_ac_money_category', "bbc");

            //เลขหมวดเงิน
            $bc_code = $this->input->post('bc_code_edit');
            if ($bc_code == "") {
                $this->bbc->bc_code = null;
            } //if
            else {
                $this->bbc->bc_code = $bc_code;
            } //else

            $this->bbc->bc_id = $this->input->post('bc_id_edit'); //ไอดีหมวดเงิน
            $this->bbc->bc_name = $this->input->post('bc_name_edit'); //ชื่อหมวดเงิน
            $this->bbc->bc_mt_id = $this->input->post('bc_mt_id'); //ไอดีประเภทหมวดเงิน
            $this->bbc->bc_us_id = $this->input->post('bc_us_id');
            $this->bbc->update();
            // $this->mmc->update_money_type_of_sub_category();

            $data["json_message"] = "update_money_category_main success";
            $data["json"] = $this->input->post('bc_name_edit');
        } //else

        echo json_encode($data);
    } // update_money_category_main_ajax

} //end class Base_category