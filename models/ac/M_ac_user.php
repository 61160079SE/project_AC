<?php
/*
 * M_ac_user
 * จัดการข้อมูลในตาราง ac_user
 * @author 61160082 Areerat Pongurai
 * @Create 2564-03-04
 */

include_once "Da_ac_user.php";

class M_ac_user extends Da_ac_user
{
    /*=====  get ข้อมูล  =====*/

    /*
     * get_all
     * ดึงข้อมูลทั้งหมดในตารางออกมา
     * @input -
     * @output ข้อมูลทั้งหมดในตาราง
     * @author 61160082 Areerat Pongurai
     * @Create Date 2564-03-04
     */

    public function get_all()
    {
        $sql = "SELECT us_id,us_name,us_pass,us_last_login
				FROM {$this->db_name}.ac_user ";
        $query = $this->db->query($sql);
        return $query;
    } //get_all

    /*
     * get_check_login
     * เช็ค login
     * @input -
     * @output ข้อมูลตาม us_name และ us_pass
     * @author 61160082 Areerat Pongurai
     * @Create Date 2564-03-04
     */

    public function get_check_login()
    {
        $sql = "SELECT us_id, us_name, us_pass ,us_last_login
				FROM {$this->db_name}.ac_user
        WHERE us_name =? AND us_pass =? ";
        $query = $this->db->query($sql, array($this->us_name, $this->us_pass));
        return $query;
    } //get_check_login

    /*
     * check_if_us_name_exist
     * ตรวจสอบว่ามี us_name รึเปล่า
     * @input -
     * @output ข้อมูลตาม us_name
     * @author 61160065 Netipong Kaewin
     * @Create Date 2564-03-04
     */

    public function check_if_us_name_exist()
    {
        $sql = "SELECT COUNT(1) AS exist
            FROM {$this->db_name}.ac_user
            WHERE us_name = ? ";
        $query = $this->db->query($sql, array($this->us_name));
        return $query;
    } // check_if_mc_name_exist

} //end class M_ac_user