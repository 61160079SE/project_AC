<?php
/*
 * M_ac_money_category
 * จัดการข้อมูลในตาราง ac_list_money
 * @author 61160173 Jirawat yuenkaew
 * @Create 2564-03-02
 */

include_once "Da_ac_money_category.php";

class M_ac_money_category extends Da_ac_money_category
{
    /*=====  get ข้อมูล  =====*/

    /*
     * get_all
     * ดึงข้อมูลทั้งหมดในตารางออกมา
     * @input -
     * @output 
     * @author 
     * @Create Date 
     */

    public function get_all()
    {
        $sql = "SELECT bc_id,bc_name,bc_mt_id,bc_us_id
				FROM {$this->db_name}.ac_base_category ";
        $query = $this->db->query($sql);
        return $query;
    } //get_all

    /*
     * get_by_type
     * 
     * @input -
     * @output 
     * @author 
     * @Create Date 
     */

    public function get_by_type()
    {
        $sql = "SELECT bc_id,bc_name,bc_mt_id,bc_us_id,mt_id,mt_name
				FROM {$this->db_name}.ac_base_category 
        LEFT JOIN {$this->db_name}.ac_money_type
          ON bc_mt_id = mt_id
        WHERE bc_mt_id = ?
        ORDER BY bc_id DESC";
        $query = $this->db->query($sql, array($this->bc_mt_id));
        return $query;
    } //get_by_type

    /*
     * check_if_name_exist
     * Insert ตรวจสอบว่าชื่อหมวดเงินที่ถูกส่งมา มีอยู่ใน level_1 ตารางหรือไม่
     * @input mc_mt_id, mc_name
     * @output 0 หรือมากกว่า 0 (0 = ไม่มี, มากกว่า 0 = มี)
     * @author 61160079 Adithep Phompha
     * @Create Date 2563-08-25
     */

    public function check_if_name_exist()
    {
        $sql = "SELECT COUNT(1) AS exist
                FROM {$this->db_name}.ac_base_category
                WHERE bc_name = ? AND bc_mt_id = ?";
        $query = $this->db->query($sql, array($this->bc_name, $this->bc_mt_id));
        return $query;
    } // check_if_name_exist

}