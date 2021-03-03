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
     * get_by_year
     * ดึงข้อมูลทั้งหมดรายปี
     * @input -
     * @output ข้อมูลทั้งหมดรายปี
     * @author 60160341 Preeyanut Boonmeemak
     * @Create Date 2564-03-02
     */
  public function get_by_year()
  {

    $sql = "SELECT dm_id,dm_date,SUM(dm_sum_income) AS sum_income,SUM(dm_sum_expense) AS sum_expense,dm_us_id,YEAR(dm_date) AS sum_year
				FROM {$this->db_name}.ac_daily_money 
        WHERE dm_us_id = ?
        GROUP BY year(dm_date)";
    $query = $this->db->query($sql, array($this->dm_us_id));
    return $query;
  } //get_by_year

  /*
     * get_all_year
     * ดึงข้อมูลปีทั้งหมด
     * @input -
     * @output ข้อมูลปีทั้งหมด
     * @author 60160341 Preeyanut Boonmeemak
     * @Create Date 2564-03-02
     */
    public function get_all_year()
    {
      $sql = "SELECT YEAR(dm_date) AS year
          FROM {$this->db_name}.ac_daily_money 
          WHERE dm_us_id = ?
          GROUP BY year(dm_date)
          ORDER BY year(dm_date) DESC";
      $query = $this->db->query($sql, array($this->dm_us_id));
      return $query;
    } //get_all_year

/*
     * get_daily
     * ดึงข้อมูลทั้งหมดในตารางออกมา
     * @input -
     * @output ข้อมูลวันทั้งหมดในตารางของผู้ใช้ที่ระบุไว้
     * @author 61160077 Siripoon Yimthanom
     * @Create Date 2564-03-02
     */

    public function get_daily()
    {
  
      $sql = "SELECT dm_id,dm_date,dm_sum_income AS sum_income,dm_sum_expense AS sum_expense,dm_us_id
          FROM {$this->db_name}.ac_daily_money 
          WHERE dm_us_id =? AND YEAR(dm_date) = ? AND MONTH(dm_date) = ? 
          ORDER BY dm_date ASC ";
  
      $query = $this->db->query($sql, array($this->dm_us_id, $this->year,$this->month));
      return $query;
    } //get_daily

  
} //end class M_ac_daily_money