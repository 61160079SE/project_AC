<?php
/*
 * Da_ac_daily_money
 * จัดการข้อมูลในตาราง acr_money_type (ที่เกี่ยวกับ insert update และ delete)
 * @author 61160182 Nawarut Nambunsri
 * @Create 2564-03-02
 */

include_once 'AC_Model.php';

class Da_ac_user extends AC_Model
{

    // PK is 
    // FK is -

    
    public $us_name;
    public $us_pass;
    public $us_email;
    public $us_last_login;


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
        $sql = "INSERT INTO {$this->db_name}.ac_user ( us_name,us_pass,us_email)
                VALUES(?,?,?)";
        $this->db->query($sql, array($this->us_name, $this->us_pass,$this->us_email));
    } //insert


 

public function check_if_us_name_exist()
{
    $sql = "SELECT COUNT(1) AS exist
            FROM {$this->db_name}.ac_user
            WHERE us_name = ? ";
    $query = $this->db->query($sql, array($this->us_name));
    return $query;
} // check_if_mc_name_exist

   
// public function get_all()
// {
//     $sql = "SELECT *
//             FROM {$this->db_name}.ac_user";
//     $query = $this->db->query($sql);
//     return $query;
// } //get_all


} //end class Da_ac_list_money