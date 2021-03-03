<?php
/*
 * M_ac_list_money
 * จัดการข้อมูลในตาราง ac_list_money
 * @author 61160182 Nawarut Nambunsri
 * @Create 2564-03-02
 */

include_once "Da_ac_daily_money.php";

class M_ac_daily_money extends Da_ac_daily_money
{
  /*=====  get ข้อมูล  =====*/

  /*
     * get_all
     * ดึงข้อมูลทั้งหมดในตารางออกมา
     * @input -
     * @output ข้อมูลทั้งหมดในตาราง
     * @author 61160182 Nawarut Nambunsri
     * @Create Date 2564-03-02
     */

  public function get_all()
  {
    $sql = "SELECT dm_id,dm_date,dm_sum_income,dm_sum_expense,dm_us_id
				FROM {$this->db_name}.ac_daily_money ";
    $query = $this->db->query($sql);
    return $query;
  } //get_all


  /*
     * get_month
     * ดึงข้อมูลทั้งหมดในตารางออกมา
     * @input -
     * @output ข้อมูลเดือนทั้งหมดในตาราง
     * @author 61160182 Nawarut Nambunsri
     * @Create Date 2564-03-02
     */

  public function get_month()
  {

    $sql = "SELECT dm_id,dm_date,SUM(dm_sum_income) AS sum_income,SUM(dm_sum_expense) AS sum_expense,dm_us_id
				FROM {$this->db_name}.ac_daily_money 
        WHERE dm_us_id =? AND YEAR(dm_date) = ?
        Group by month(dm_date)";

    $query = $this->db->query($sql, array($this->dm_us_id, $this->year));
    return $query;
  } //get_month

  /*
     * get_by_date
     * ดึงข้อมูลทั้งหมดในตารางออกมา
     * @input -
     * @output ข้อมูลทั้งหมดในตารางโดยดึงตามวันที่และไอดีผู้ใช้
     * @author 61160182 Nawarut Nambunsri
     * @Create Date 2564-03-02
     */
} //end class M_ac_daily_money