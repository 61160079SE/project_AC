<?php
/*
 * Da_ac_list_money
 * จัดการข้อมูลในตาราง acr_money_type (ที่เกี่ยวกับ insert update และ delete)
 * @author 61160173 Jirawat yuenkaew
 * @Create 2564-03-02
 */

include_once 'AC_Model.php';

class Da_ac_list_money extends AC_Model
{

    // PK is mt_id
    // FK is -

    public $lm_id;
    public $lm_date;
    public $lm_customize_category;
    public $lm_money;
    public $lm_bc_id;
    public $lm_us_id;
    public $lm_mt_id;

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  contructor  =====*/

    /*
     * __construct
     * -
     * @input -
     * @output -
     * @author 61160173 Jirawat yuenkaew
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
     * @input lm_date,lm_customize_category,lm_money,lm_bc_id,lm_us_id,lm_mt_id
     * @output -
     * @author 61160173 Jirawat yuenkaew
     * @Create Date 2564-03-02
     */

    public function insert()
    {
        $sql = "INSERT INTO {$this->db_name}.ac_list_money ( lm_date,lm_customize_category,lm_money,lm_bc_id,lm_us_id,lm_mt_id)
                VALUES(?,?,?,?,?,?)";
        $this->db->query($sql, array($this->lm_date, $this->lm_customize_category, $this->lm_money, $this->lm_bc_id, $this->lm_us_id, $this->lm_mt_id));

    } //insert

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

    /*=====  update  =====*/

    /*
     * update
     * แก้ไขข้อมูลในตารางทั้ง record โดยอ้างอิงจาก id
     * @input lm_date,lm_customize_category,lm_money,lm_bc_id,lm_us_id,lm_mt_id,lm_id
     * @output -
     * @author 61160173 Jirawat yuenkaew
     * @Create Date 2564-03-02
     */

    public function update()
    {
        $sql = "UPDATE {$this->db_name}.ac_list_money
        SET	lm_date =? ,lm_customize_category =?,lm_money =?,lm_bc_id =?,lm_us_id =?,lm_mt_id =?
        WHERE lm_id =?";
        $this->db->query($sql, array($this->lm_date, $this->lm_customize_category, $this->lm_money, $this->lm_bc_id, $this->lm_us_id, $this->lm_mt_id, $this->lm_id));

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
     * @author 61160173 Jirawat yuenkaew
     * @Create Date 2564-03-02
     */

    public function delete()
    {
        $sql = "DELETE FROM {$this->db_name}.ac_list_money
        WHERE lm_id=?";
        $this->db->query($sql, array($this->lm_id));

    } //delete

    // =====================================================================================================================
    // =====================================================================================================================
    // =====================================================================================================================

} //end class Da_ac_list_money