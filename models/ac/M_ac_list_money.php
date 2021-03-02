<?php
/*
 * M_ac_list_money
 * จัดการข้อมูลในตาราง ac_list_money
 * @author 61160173 Jirawat yuenkaew
 * @Create 2564-03-02
 */

include_once "Da_ac_list_money.php";

class M_ac_list_money extends Da_ac_list_money
{
    /*=====  get ข้อมูล  =====*/

    /*
     * get_all
     * ดึงข้อมูลทั้งหมดในตารางออกมา
     * @input -
     * @output ข้อมูลทั้งหมดในตาราง
     * @author 61160173 Jirawat yuenkaew
     * @Create Date 2564-03-02
     */

    public function get_all()
    {
        $sql = "SELECT lm_date,lm_customize_category,lm_money,lm_bc_id,lm_us_id,lm_mt_id,lm_id
				FROM {$this->db_name}.ac_list_money ";
        $query = $this->db->query($sql);
        return $query;
    } //get_all

    /*
     * get_by_date
     * ดึงข้อมูลทั้งหมดในตารางออกมา
     * @input -
     * @output ข้อมูลทั้งหมดในตารางโดยดึงตามวันที่และไอดีผู้ใช้
     * @author 61160173 Jirawat yuenkaew
     * @Create Date 2564-03-02
     */

    public function get_by_date()
    {
        $sql = "SELECT lm_date,lm_customize_category,lm_money,lm_bc_id,lm_us_id,lm_mt_id,lm_id,bc_name
				FROM {$this->db_name}.ac_list_money 
        LEFT JOIN {$this->db_name}.ac_base_category ON lm_bc_id = bc_id
        WHERE lm_date =? AND lm_us_id=? AND lm_mt_id = ?";
        $query = $this->db->query($sql, array($this->lm_date,$this->lm_us_id,$this->lm_mt_id));
        return $query;
    } //get_by_date
} //end class M_ac_list_money