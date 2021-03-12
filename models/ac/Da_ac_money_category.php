<?php
/*
 * Da_ac_money_category
 *
 * @author
 * @Create
 */

include_once 'AC_Model.php';

class Da_ac_money_category extends AC_Model
{
    public $bc_id;
    public $bc_name;
    public $bc_mt_id;
    public $bc_us_id;

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  contructor  =====*/

    /*
     * __construct
     * -
     * @input -
     * @output -
     * @author
     * @Create Date
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
     * @input bc_name,bc_mt_id,bc_us_id
     * @output -
     * @author
     * @Create Date
     */

    public function insert()
    {
        $sql = "INSERT INTO {$this->db_name}.ac_base_category (bc_name,bc_mt_id,bc_us_id)
                VALUES(?,?,?)";
        $this->db->query($sql, array($this->bc_name, $this->bc_mt_id, $this->bc_us_id));
    } //insert

// =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  update  =====*/

    /*
     * update
     * แก้ไขข้อมูลในตารางทั้ง record โดยอ้างอิงจาก id
     * @input bc_name,bc_mt_id,bc_us_id, bc_id
     * @output -
     * @author
     * @Create Date
     */

    public function update()
    {
        $sql = "UPDATE {$this->db_name}.ac_base_category
        SET bc_name =?,bc_mt_id =?, bc_us_id =?
        WHERE bc_id =?";
        $this->db->query($sql, array($this->bc_name, $this->bc_mt_id, $this->bc_us_id, $this->bc_id));
    } //update

    /*=====  delete  =====*/

    /*
     * delete
     * ลบข้อมูล 1 record ในตารางโดยอ้างอิงจาก id
     * @input bc_id
     * @output -
     * @author
     * @Create Date
     */

    public function delete()
    {
        $sql = "DELETE FROM {$this->db_name}.ac_base_category
        WHERE bc_id=?";
        $this->db->query($sql, array($this->bc_id));
    } //delete

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================
} //Da_ac_money_category