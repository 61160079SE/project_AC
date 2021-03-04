<?php
/*
 * Da_ac_daily_money
 * จัดการข้อมูลในตาราง acr_money_type (ที่เกี่ยวกับ insert update และ delete)
 * @author 61160182 Nawarut Nambunsri
 * @Create 2564-03-02
 */

include_once 'AC_Model.php';

class Da_ac_daily_money extends AC_Model
{

    // PK is dm_id
    // FK is -

    public $dm_id;
    public $dm_date;
    public $dm_sum_income;
    public $dm_sum_expense;
    public $dm_us_id;

    public $year;
    public $month;
    public $day;

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  contructor  =====*/

    /*
     * __construct
     * -
     * @input -
     * @output -
     * @author 61160182 Nawarut Nambunsri
     * @Create Date 2564-03-02
     */

    public function __construct()
    {
        parent::__construct();
    } //__construct

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  insert  =====*/

    /*
     * insert
     * เพิ่มข้อมูล 1 record ในตาราง
     * @input dm_id,dm_date,dm_sum_income, dm_sum_expense,dm_us_id
     * @output -
     * @author 61160182 Nawarut Nambunsri
     * @Create Date 2564-03-02
     */

    public function insert()
    {
        $sql = "INSERT INTO {$this->db_name}.ac_daily_money ( dm_date,dm_sum_income,dm_sum_expense,dm_us_id)
                VALUES(?,?,?,?,?,?)";
        $this->db->query($sql, array($this->dm_date, $this->dm_sum_income, $this->dm_sum_expense, $this->dm_us_id));
    } //insert

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  update  =====*/

    /*
     * update
     * แก้ไขข้อมูลในตารางทั้ง record โดยอ้างอิงจาก id
     * @input dm_id,dm_date,dm_sum_income, dm_sum_expense,dm_us_id
     * @output -
     * @author 61160182 Nawarut Nambunsri
     * @Create Date 2564-03-02
     */

    public function update()
    {
        $sql = "UPDATE {$this->db_name}.ac_daily_money
        SET	dm_date =?,dm_sum_income =?, dm_sum_expense =?,dm_us_id =?
        WHERE dm_id =?";
        $this->db->query($sql, array($this->dm_date, $this->dm_sum_income, $this->dm_sum_expense, $this->dm_us_id, $this->dm_id));
    } //update

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  delete  =====*/

    /*
     * delete
     * ลบข้อมูล 1 record ในตารางโดยอ้างอิงจาก id
     * @input lm_id
     * @output -
     * @author 61160182 Nawarut Nambunsri
     * @Create Date 2564-03-02
     */

    public function delete()
    {
        $sql = "DELETE FROM {$this->db_name}.ac_daily_money
        WHERE lm_id=?";
        $this->db->query($sql, array($this->lm_id));
    } //delete

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

} //end class Da_ac_list_money