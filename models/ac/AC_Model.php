<?php
/*
 * AC_model
 * model หลักของระบบ AC
 * @author 61160079 Adithep Phompha
 * @Create Date 2563-07-19
 */

class AC_model extends CI_Model
{
    //เก็บชื่อ database ของระบบ AC
    public $db;
    public $db_name;

    public $test;

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  contructor  =====*/

    /*
     * __construct
     * กำหนดค่าเริ่มต้นให้ตัวแปร และ load database
     * @input database ของระบบ AC
     * @output -
     * @author 61160079 Adithep Phompha
     * @Create Date 2563-07-19
     */

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database("ac", true);
        $this->db_name = $this->db->database;

        $this->test = "I am AC_model";
        
    } //__construct

    public function get_all()
    {
        $sql = "SELECT *
                FROM {$this->db_name}.ac_money_type";
        $query = $this->db->query($sql);
        return $query;
    } //get_all

} //end class AC_model