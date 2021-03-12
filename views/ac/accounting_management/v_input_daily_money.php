<?
/*
 * v_input_daily_money
 * หน้าจอเข้าสู่ระบบ
 * @author 61160079 Adithep Phompha
 * @Create Date 2564-03-11
 */
?>

<style>
button, div,  a{
      font-size: 16px !important;
}

</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
var gl_date_exist = false;
var gl_count_new_row = 0 ;

var gl_arr_delete_row = Array();

var gl_sum_money  ={};
gl_sum_money['income'] = 0;
gl_sum_money['expense'] = 0;

var gl_obj_list = {}; 
gl_obj_list['income'] = Array();
gl_obj_list['expense'] = Array();

var gl_obj_base = {};
gl_obj_base['income'] = Array();
gl_obj_base['expense'] = Array();
</script>

<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>

<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->


<!--  navigator  -->

<div class="card-body">
      <div class="bd-example">
            <nav style='margin-bottom: -2rem;'>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item" style="position">
                              <a href="<?php echo site_url() . "/" . $this->config->item('ac_controller') ?>show_homepage">
                                    <span class="material-icons">home</span> หน้าแรกของระบบ
                              </a>
                        </li>
                        <li class="breadcrumb-item active">
                              จัดการข้อมูลทางบัญชี
                        </li>
                  </ol>
            </nav>
      </div>
</div>

<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->


<div class="col-md-12">
      <div class="row">
            <div class="col-md-6">
                  <div class="card">
                        <div class="card-body" style="height:100px; width:100%; text-align:center;padding-top:30px;">
                              <h4>วัน/เดือน/ปี <input onchange="check_date_exist()" id="search_date"type='date' value=""></h4> 
                        </div>
                  </div>
            </div>
            <div class="col-md-6">
                  <div class="card">
                        <div class="card-body">
                              <div class="row">
                                    <!-- รายรับ -->
                                    <div class="col-md-5">
                                          <div class="row"> <i class="material-icons">equalizer</i>  รายรับ : </div>
                                    </div>
                                    <div class="col-md-7" id="income_money" style="text-align:right"> </div>
                                    <!-- รายจ่าย -->
                                    <div class="col-md-5">
                                          <div class="row"><i class="material-icons">equalizer</i>  รายจ่าย : </div>
                                    </div>
                                    <div class="col-md-7" id="expense_money" style="text-align:right"></div>
                                    <!-- คงเหลือ -->
                                    <div class="col-md-5">
                                          <div class="row"><i class="material-icons">equalizer</i>  คงเหลือ : </div>
                                    </div>
                                    <div class="col-md-7" id="remaining_budget" style="text-align:right"> </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      <div class="card">
            <div class="card-header card-header-icon card-header-primary">
                  <div class="card-icon">
                        <i class="material-icons">assignment</i>
                  </div>

                  <h3 class="card-title ">
                        <span id="table_name">ตารางรายละเอียดรายรับ-รายจ่าย</span>
                  </h3>

            </div>
            <div class="col-md-12">
                  <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                              <div class="nav-tabs-navigation">
                                    <div class="nav-tabs-wrapper">
                                          <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item">
                                                      <a class="nav-link active" href="#income" data-toggle="tab">
                                                            รายรับ
                                                            <div class="ripple-container"></div>
                                                      </a>
                                                </li>
                                                <li class="nav-item">
                                                      <a class="nav-link" href="#expense" data-toggle="tab">
                                                            รายจ่าย
                                                            <div class="ripple-container"></div>
                                                      </a>
                                                </li>
                                          </ul>
                                    </div>
                              </div>
                        </div>
                  </div>
            
                  <div class="card-body">
                        <div class="tab-content">
                              <div class="tab-pane active" id="income">
                                    <div style="margin-top: 20px; margin-bottom: 20px;" id="table_income">
                                    </div>
                              </div>
                              <div class="tab-pane " id="expense">
                                    <div style="margin-top: 20px; margin-bottom: 20px;" id="table_expense">
                                    
                                    </div> 
                              </div>
                        </div>
                
                        <div class="row">
                              <div class="col-md-12" style="width:100%;text-align:center;">
                                    <button class="btn btn-success"onclick="save_data()">บันทึก</button>
                              </div>
                        </div>           
                  </div>
            </div>
      </div>
</div>

<script>
$(document).ready(function() {
       set_date();
});


/*
 * set_date
 * ใส่วะนที่ปัจจุบันใน dropdown
 * @input -
 * @output -
 * @author 61160079 Adithep Phompha
 * @Create Date 2564-03-11
 */


function set_date() {
      var now = new Date();
      var day = ("0" + now.getDate()).slice(-2);
      var month = ("0" + (now.getMonth() + 1)).slice(-2);
      var today = now.getFullYear() + "-" + (month) + "-" + (day);

      today = "2564-01-10";
      
      $('#search_date').val(today);

      check_date_exist();
}//set_date

/*
 * check_date_exist
 * ตรวจสอบว่า มีข้อมูลวันที่ที่เลือกใน  dropdown อยู่ใน database หรือไม่
 * @input -
 * @output -
 * @author 61160079 Adithep Phompha
 * @Create Date 2564-03-11
 */



function check_date_exist() {
      $.ajax({
            type: "post",
            url: "<?php echo site_url() . "/" . $this->config->item("ac_input_daily_money") ?>check_date_exist_ajax",
            data: {
                  'date': $('#search_date').val()
            },
            dataType: "JSON",
            success: function(json_data) {

            
                  if(json_data['json_date_exist']){
                        gl_date_exist = true;
                  }else{
                        $('#table_income').html("<h3 class='text-info' style='width=100%;text-align:center'>ไม่พบข้อมูล</h3>");
                        $('#table_expense').html("<h3 class='text-info' style='width=100%;text-align:center'>ไม่พบข้อมูล</h3>");
                        $('#income_money').html("");
                        $('#expense_money').html("");
                        $('#remaining_budget').html("");
                        gl_date_exist = false;

                        gl_sum_money['income'] = 0;
                        gl_sum_money['expense'] = 0;

                        gl_obj_list['income'] = Array();
                        gl_obj_list['expense'] = Array();

                        gl_obj_base['income'] = Array();
                        gl_obj_base['expense'] = Array();
                  }//else

                  get_base_data()
            }
      }); //ajax
}//check_date_exist


/*
 * get_base_data
 * ดึงข้อมูลพื้นฐาน
 * @input -
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Create Date 2564-03-02
 */
function get_base_data() {
      $.ajax({
            type: "POST",
            url: "<?php echo site_url() . "/" . $this->config->item('ac_input_daily_money') ?>get_list_dropdown_ajax",
            data: {
                  'user_id': 1
            },
            dataType: "JSON",
            success: function(json_data) {

                  gl_obj_base['income'] =  json_data["income"];
                  gl_obj_base['expense'] =  json_data["expense"];

                   if(gl_date_exist == true){
                        get_list_money();
                   }//if
                   else{
                        create_table("income");
                        create_table("expense");
                        set_card_money();
                   }//else

            }
      }); //ajax
}//get_base_data


/*
 * get_list_money
 * ดึงข้อมูลรายการเงิน
 * @input -
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Create Date 2564-03-02
 */
function get_list_money() {
      $.ajax({
            type: "post",
            url: "<?php echo site_url() . "/" . $this->config->item('ac_input_daily_money') ?>get_list_money_ajax",
            data: {
                  'date': $('#search_date').val()
            },
            dataType: "JSON",
            success: function(json_data) {
                  //console.log(json_data);

                  gl_obj_list['income'] =  json_data["income"];
                  gl_obj_list['expense'] =  json_data["expense"];


                  create_table("income");
                  create_table("expense");
                  set_card_money();

            }
      }); //ajax
}//get_list_money

/*
 * create_table
 * สร้างตาราง
 * @input money_type
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Create Date 2564-03-02
 */
function create_table(money_type) {


      console.log(gl_obj_list[money_type]);

      let sum_money = 0;

      let html_code = "";
      html_code += '<table id="datatable_'+money_type +'" class="table table-striped table-color-header table-hover table-border" cellspacing="0" width="100%" style="width:100%">';
      html_code += '<thead class=" text-primary">';
      html_code += '<tr>'
      html_code += '<th class="head_color" style="text-align : center">ลำดับ</th>';
      
      if (money_type == 'income') {
            html_code += '<th width="40%" class="head_color" style="text-align :h left">รายการรายรับ</th>'
      } else {
            html_code += '<th width="40%" class="head_color" style="text-align :h left">รายการรายจ่าย</th>'
      };
      html_code += '<th class="head_color" style="text-align : center">จำนวนเงิน (บาท)</th>';
      html_code += '<th class="head_color" style="text-align : center">การดำเนินการ</th>'
      html_code += '</tr>';
      html_code += '</thead>';

      // ตารางรายการ
      html_code += '<tbody>';

      gl_obj_list[money_type].forEach((row, index) => {
            html_code += '<tr>';
            html_code += '<td style="text-align : center">' + (index + 1) + '</td>';

            if(row.lm_customize_category == null){
                  row.lm_customize_category = "is_null";
            }//if

            if (row.lm_customize_category != null && row.lm_customize_category  != "is_null") {
                  html_code += '<td style="text-align : left">';
                  html_code += '<input type="text"  id="'+ row.lm_id +'"  class="customize_'+ money_type +'" value="' + row.lm_customize_category + '">';
                  html_code += '</td>';
            } else {
                  html_code += '<td style="text-align : left">';
                  html_code += '<select style="width:80%" id="'+ row.lm_id +'" class="base_'+ money_type +'" >';

                   gl_obj_base[money_type].forEach((dd_row, dd_index) => {
                         let selected = "";
                         if(dd_row.bc_id == row.lm_bc_id){
                               selected = "selected";
                         }
                        html_code += '<option value="'+dd_row.bc_id +'" '  + selected +'>'+ dd_row.bc_name +'</option>';
                   });
                  html_code += '</select>';
                  html_code += '</td>';
            }

            html_code += '<td style="text-align : right">';
            html_code += '<input style="text-align:right;" id = "money_'  + row.lm_id + '" type="number" value ="' + row.lm_money + '" onkeyup="set_card_money()">';
            html_code += '</td>';

            html_code += '<td style = "text-align:center;">'
            html_code += '<button type="button" style="margin:5px;" class="btn btn-danger btn-edit acr_button" onclick="delete_row(\'' + row.lm_id + '\',\'' + money_type + '\')" >';
            html_code += '<i class="fa fa-trash-o"></i>';
            html_code += '</button>';
            html_code += '</td>'

            html_code += '</tr>';
            sum_money += parseFloat(row.lm_money);
            
      }); //foreach

      html_code += '</tbody>';
      html_code += '</table>';

      html_code += '<br>';
      html_code += '<div class="row">';
      html_code += '<div class="col-md-12" style="width:100%;text-align:center;">';
      html_code += '<button class="btn btn-info" style = "margin-right:50px" onclick="add_row_base(\'' + money_type + '\')">เพิ่มข้อมูลพื้นฐาน</button>';
      html_code += '<button class="btn "  onclick="add_row_customize(\'' + money_type + '\')">เพิ่มรายการใหม่</button>';
      html_code += '</div>';
      html_code += '</div>';;
     

      $('#table_' + money_type ).html(html_code);
      let datatable = make_dataTable_byId('datatable_' + money_type);
      datatable.page.len(-1).draw(); // กำหนดจำนวน max ข้อมูลใน 1 หน้า


      $('.base_' + money_type).each(function() {
            $(this).select2();
      });

      $('.base_' + money_type).each(function() {
            let lm_id = $(this).attr('id');
            let value = $(this).val();

             let arr_base = gl_obj_list[money_type];
            let my_length = arr_base.length;

            for (i = 0; i < my_length ; i++) {
                  if(arr_base[i].lm_id == lm_id){
                        arr_base[i].lm_bc_id = value;
                  }//if
            } //for

            gl_obj_list[money_type] = arr_base;


             update_gl_obj_list("income");
             update_gl_obj_list("expense");

      });


      gl_sum_money[money_type] = sum_money;
      

} //create_table

/*
 * set_card_money
 * กำหนดค่า card เงินรวม
 * @input -
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Create Date 2664-03-01
 */

function set_card_money(){

      //cal_money();

      $('#income_money').html(formatNumber(gl_sum_money['income']) + "  ฿");
      $('#expense_money').html(formatNumber(gl_sum_money['expense']) + "  ฿");

      $('#remaining_budget').html(formatNumber(gl_sum_money["income"] - gl_sum_money["expense"]) + "  ฿");
}//set_card_money


/*
 * update_gl_obj_list
 * update gl_obj_list
 * @input -
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Create Date 2664-03-01
 */
function update_gl_obj_list(money_type){


      let arr_base = gl_obj_list[money_type];

      for (i = 0; i < arr_base.length; i++) {

            let lm_id = arr_base[i].lm_id;

             if ($('#' + lm_id).hasClass('customize_' + money_type)) {
                 arr_base[i].lm_customize_category = $('#'+  lm_id).val();
            } //if
            else {
                 arr_base[i].lm_bc_id = $('#'+  lm_id).val();
            } //else


            if($('#money_'+  lm_id).val() == ""){
                  arr_base[i].lm_money = 0;
            }//if
            else{
                  arr_base[i].lm_money = $('#money_'+  lm_id).val();
            }//else
           

            
      } //for

      gl_obj_list[money_type] = arr_base;


}//update_gl_obj_list

/*
 * delete_row
 * ลบแถวที่ต้องการ
 * @input -
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Create Date 2664-03-01
 */
function delete_row(lm_id, money_type) {

      update_gl_obj_list(money_type);


      let arr_base = gl_obj_list[money_type];
      let my_length = arr_base.length;

      for (i = 0; i < my_length ; i++) {
            if(arr_base[i].lm_id == lm_id){

                  if(!String(lm_id).includes("new_")){
                        gl_arr_delete_row.push(arr_base[i].lm_id);
                  }//if

                  arr_base.splice(i, 1);
                  i = my_length;

                  
            }//if
      } //for

      gl_obj_list[money_type] = arr_base;


      create_table(money_type);
      set_card_money();

} //delete_row

/*
 * add_row_base
 * add_row_base
 * @input-
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Create Date 2664-03-01
 */
function add_row_base(money_type) {

      update_gl_obj_list(money_type);
      ++gl_count_new_row;

      let id_money_type = 0;
      if(money_type == "income" ){
            id_money_type = 1;
      }else{
             id_money_type = 2;
      }//else

      let obj_data =  {};

      obj_data["lm_id"] = 'new_' + gl_count_new_row;
      obj_data["lm_bc_id"] = 0;
      obj_data["lm_customize_category"] = "is_null";
      obj_data["lm_money"] = 0;
      obj_data["lm_mt_id"] = id_money_type;
      obj_data["lm_date"] = $('#search_date').val();

      gl_obj_list[money_type].push(obj_data);

      create_table(money_type);     

} //add_row_base

/*
 * add_row_customize
 * add_row_customize
 * @input -
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Create Date 2664-03-01
 */
function add_row_customize(money_type) {
  
      update_gl_obj_list(money_type);
      ++gl_count_new_row;

      let id_money_type = 0;
      if(money_type == "income" ){
            id_money_type = 1;
      }else{
             id_money_type = 2;
      }//else

      let obj_data =  {};

      obj_data["lm_id"] = 'new_' + gl_count_new_row;
      obj_data["lm_bc_id"] = "is_null";
      obj_data["lm_customize_category"] = "";
      obj_data["lm_money"] = 0;
      obj_data["lm_mt_id"] = id_money_type;
      obj_data["lm_date"] = $('#search_date').val();

      gl_obj_list[money_type].push(obj_data);

      create_table(money_type);     


} //add_row_customize


/*
 * save_data
 * บันทึกข้อมูล
 * @input-
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Create Date 2664-03-01
 */
function save_data() {
      
       update_gl_obj_list("income");
      update_gl_obj_list("expense");

      console.log(gl_obj_list);

      $.ajax({
            type: "post",
            url: "<?php echo site_url() . "/" . $this->config->item('ac_input_daily_money') ?>save_data_ajax",
            data: {
                  'arr_delete': gl_arr_delete_row,
                  'obj_list' : gl_obj_list
            },
            dataType: "JSON",
            success: function(json_data) {
                  //console.log(json_data);

                  if(json_data['message'] == "success"){
                        //window.location.href = "<?php echo site_url() . "/" . $this->config->item('ac_controller') ?>show_homepage";
                  }
            }
      }); //ajax
}//get_list_money
</script>