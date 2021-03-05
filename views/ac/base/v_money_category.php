<!-- ตัวแปร global-->

<script>
var gl_count_income = 0;
var gl_count_expense = 0;
</script>

<!--  card  -->

<div class="col-md-12">
    <div class="row">

        <!--  card เพิ่มหมวดเงินหลัก  -->

        <div class="col-md-6">
            <a href="#pablo" data-toggle="modal" data-target="#modal_add_main_category" id="">
                <div class="card card-stats card-add hvr-bounce-to-top hvr-shadow">
                    <div class="card-header card-header-primary">
                        <h2 class="card-category">&emsp;</h2>
                        <h2 class="card-title">เพิ่มรายการ</h2>
                    </div>
                    <div class="card-footer">
                        <p class="card-category"></p>
                        <div class="stats">
                            <i class="material-icons text-primary" style='color: #fff !important;'>loupe</i>
                            คลิกเพื่อเพิ่มรายการใหม่
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- รายรับ -->
                        <div class="col-md-6">
                            <div class="row"> <i class="material-icons">equalizer</i>  รายรับ : </div>
                        </div>
                        <div class="col-md-6" id="count_income" style="text-align:center"> </div>
                        <!-- รายจ่าย -->
                        <div class="col-md-6">
                            <div class="row"><i class="material-icons">equalizer</i>  รายจ่าย : </div>
                        </div>
                        <div class="col-md-6" id="count_expense" style="text-align:center"></div>
                        <!-- คงเหลือ -->
                        <div class="col-md-6">
                            <div class="row"><i class="material-icons">equalizer</i>&nbsp; ทั้งหมด : </div>
                        </div>
                        <div class="col-md-6" id="sum_category" style="text-align:center"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--  card ตารางข้อมูลหมวดเงินหลัก  -->

<div class="card">
    <div class="card-header card-header-icon card-header-primary">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>

        <h3 class="card-title ">
            <span id="table_name">รายรับ-รายจ่าย</span>
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
    </div>

    <!-- ========================================================================================================== -->
    <!-- ========================================================================================================== -->
    <!-- ========================================================================================================== -->

    <!--  Modal -->

    <!--  Modal_Add_หมวดเงินหลัก -->

    <div class="modal fade bd-example-modal-lg" id="modal_add_main_category">
        <div class="modal-dialog">
            <div class="modal-content" style="width:700px">
                <div class="modal-header">
                    <h3 class="modal-title card-title ">เพิ่มรายการ</h3>
                    <!--  ปุ่มปิด -->
                    <button class="btn btn-fab btn-modal" id="btn_close" rel="tooltip" data-dismiss="modal" title="" data-original-title="คลิกเพื่อปิด">ปิด</button>
                </div>
                <div class="modal-body scrollar-show">
                    <div class="col-md-12">
                        <div class="row">
                            <!--  กรอกชื่อหมวดเงินหลัก -->
                            <label class="col-md-2 col-form-label text-left">ชื่อ <code>*</code></label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input class="form-control input-lg " type="text" id="bc_name_main" required="true" placeholder="เช่น หมวดภาษี">
                                    <span class="bmd-help"></span>
                                </div>
                            </div>
                            <!--  เลือกประเภทหมวดเงินหลัก -->
                            <label class="col-md-2 col-form-label text-left">ประเภท <code>*</code></label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input checkbox_insert_modal" type="radio" name="money_type_insert" id="bc_money_type" value="1"> รายรับ
                                            <span class="circle"><span class="check"></span></span>
                                        </label>
                                        &emsp;
                                        <label class="form-check-label">
                                            <input class="form-check-input checkbox_insert_modal" type="radio" name="money_type_insert" id="bc_money_type" value="2"> รายจ่าย
                                            <span class="circle"><span class="check"></span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <!--  ปุ่มยกเลิก -->
                                <button class="btn btn-danger" data-dismiss="modal" style='float:left;' rel="tooltip" data-placement="top" title='คลิกเพื่อยกเลิกข้อมูล'>ยกเลิก</button>
                                <!--  ปุ่มบันทึก -->
                                <button class="btn btn-success " style='float:right;' rel="tooltip" data-placement="top" title='คลิกเพื่อบันทึกข้อมูล' onclick="insert_main_category()">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--  Modal_Edit_หมวดเงินหลัก -->

    <div class="modal fade bd-example-modal-lg" id="modal_edit_main_category">
        <div class="modal-dialog">
            <div class="modal-content" style="width:650px">
                <div class="modal-header">
                    <!--  กรอกชื่อหมวดเงินหลัก -->
                    <h3 class="modal-title card-title">แก้ไขรายการ</h3>
                    <input type="hidden" value="" id="bc_id_edit">
                    <input type="hidden" value="" id="default_bc_name_edit">

                    <button class="btn btn-fab btn-modal" id="btn_close" rel="tooltip" data-dismiss="modal" title="" data-original-title="คลิกเพื่อปิด">ปิด</button>
                </div>
                <div class="modal-body scrollar-show">
                    <div class="col-md-12">
                        <div class="row">
                            <label class="col-md-2 col-form-label text-left">ชื่อ <code>*</code></label>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <input class="form-control input-lg" type="text" id="bc_name_edit" required="true">
                                    <span class="bmd-help"></span>
                                </div>
                            </div>
                        </div>
                        <!-- ประเภทหมวดเงิน -->
                        <div class="col-md-7" style="visibility:hidden;">
                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input checkbox_edit_modal" type="radio" name="money_type_update" id="edit_income" value="1"> รายรับ
                                        <span class="circle"><span class="check"></span></span>
                                    </label>
                                    <label class="form-check-label">
                                        <input class="form-check-input checkbox_edit_modal" type="radio" name="money_type_update" id="edit_expense" value="2"> รายจ่าย
                                        <span class="circle"><span class="check"></span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <!--  ปุ่มยกเลิก -->
                                <button class="btn btn-danger" data-dismiss="modal" style='float:left;' rel="tooltip" data-placement="top" title='คลิกเพื่อยกเลิกข้อมูล'>ยกเลิก</button>
                                <!--  ปุ่มบันทึก -->
                                <button class="btn btn-success " style='float:right;' rel="tooltip" data-placement="top" title='คลิกเพื่อบันทึกข้อมูล' onclick="update_main_category()">บันทึก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ========================================================================================================== -->
    <!-- ========================================================================================================== -->
    <!-- ========================================================================================================== -->

    <script>
    //Document ready
    $(document).ready(function() {
        /* สร้างตาราง */
        get_data();

    }); // document ready

    /*
     * get_data
     * ดึงข้อมูลรายการเงิน
     * @input -
     * @output -
     * @author 61160173 Jirawat yuenkaew
     * @Create Date 2564-03-02
     */

    function get_data() {
        $.ajax({
            type: "post",
            url: "<?php echo site_url() . "/" . $this->config->item('ac_money_main') ?>get_main_category_ajax",
            data: {

            },
            dataType: "JSON",
            success: function(json_data) {
                console.log(json_data);
                create_table(1, json_data["income"]);
                create_table(2, json_data["expense"]);
            }
        }); //ajax
    }

    /*
     * create_table
     * สร้างตาราง
     * @input money_type
     * @output -
     * @author 61160173 Jirawat yuenkaew
     * @Create Date 2564-03-02
     */
    function create_table(money_type, money_data) {
        let html_code = "";
        let count_category = 0;
        if (money_data == "no_data") {
            html_code += 'ไม่มีข้อมูล ';
        } else {
            html_code += '<table class="table table-striped table-color-header table-hover table-border" cellspacing="0" width="100%" style="width:100%">';
            html_code += '   <thead class=" text-primary">';
            html_code += '     <tr>'
            html_code += '        <th class="head_color" style="text-align : center">ลำดับ</th>';
            if (money_type == 1) {
                html_code += '         <th class="head_color" style="text-align : center">รายการ</th>'
            } else {
                html_code += '         <th class="head_color" style="text-align : center">รายการ</th>'
            };
            html_code += '<th class="head_color" style="text-align : center">ดำเนินการ</th>';
            html_code += '</tr>';
            html_code += '</thead>';
            html_code += '<tbody>';
            money_data.forEach((row, index) => {
                count_category++;
                html_code += '<tr>';
                html_code += '<td style="text-align : center">' + (index + 1) + '</td>';
                html_code += '<td style="text-align : h left">' + row.bc_name + '</td>';
                html_code += '<td style="text-align : center">'
                //ปุ่มแก้ไข
                html_code += "<a href='#pablo' data-toggle='modal' data-target='#modal_edit_main_category' id=''>";
                html_code += '<button type="button" style="margin:5px;" rel="tooltip" class="btn btn-warning btn-edit acr_button" data-placement="top" onclick="set_edit_modal_main(\'' + row.bc_id + '\' , \'' + row.bc_name + '\' , \'' + row.bc_mt_id + '\' )" data-toggle="modal" data-target="#modal_edit" title="" data-original-title="คลิกเพื่อแก้ไขข้อมูล" data-id="">';
                html_code += '<i class="material-icons">edit</i>';
                html_code += '</button>';
                html_code += "</a>";
                //ปุ่มลบ
                html_code += '<button type="button" rel="tooltip" class="btn btn-danger btn-del acr_button" data-original-title="" title="คลิกเพื่อลบข้อมูล" onclick="confirm_delete_main_category(' + row.bc_id + ')">';
                html_code += '<span class=" style="margin:5px;" btn-label"><i class="material-icons">clear</i></span>';
                html_code += '</button>';
                html_code += '</td>';
                html_code += '</tr>';
            }); //foreach
            html_code += '</tbody>';
            html_code += '</table>';
        }
        if (money_type == 1) {
            $('#table_income').html(html_code)
            $('#count_income').html(count_category + '  รายการ')
            gl_count_income = count_category

        } else {
            $('#table_expense').html(html_code)
            $('#count_expense').html(count_category + '     รายการ')
            $('#sum_category').html(gl_count_income + count_category + '    รายการ')
            gl_count_expense = count_category
        };


    } //create_table

    // ==========================================================================================================
    // ==========================================================================================================
    // ==========================================================================================================

    /*  เพิ่มข้อมูลลง database  */

    /*
     * insert_main_category
     * เพิ่มหมวดเงินหลัก
     * @input ชื่อหมวดเงิน, เลขหมวดเงิน, id ประเภทหมวดเงิน
     * @output -
     * @author 61160077 Siripoon Yimthanom
     * @Create Date 2563-11-19
     */

    function insert_main_category() {

        var bc_name_m = $('#bc_name_main').val().trim(); //ชื่อหมวดเงิน
        var bc_mt_id = $('input[name="money_type_insert"]:checked').val(); //id ประเภทหมวดเงิน

        //ตรวจสอบcheckboxถูกเลือกหรือไม่
        var check_fill_status = $('.checkbox_insert_modal:checked').length > 0;

        //ตรวจสอบว่าลืมกรอกข้อมูลอะไรบ้าง
        var message = "";
        if (bc_name_m == "" && check_fill_status == false) {
            message = "กรุณากรอกชื่อรายการ <br> และเลือกประเภทรายการ";
        } //if
        else if (bc_name_m == "") {
            message = "กรุณากรอกชื่อรายการ";
        } //else if
        else if (check_fill_status == false) {
            message = "กรุณาเลือกประเภทรายการ";
        } //else if


        if (message != "") {
            //แจ้งเตือนกรอกข้อมูลไม่ครบ
            show_warning(message);
        } // if
        else {

            $.ajax({
                type: "post",
                url: "<?php echo site_url() . "/" . $this->config->item('ac_money_main') ?>insert_money_category_main_ajax",
                data: {

                    'bc_name_m': bc_name_m,
                    'bc_mt_id': bc_mt_id,
                    'bc_us_id': 1
                },
                dataType: "JSON",
                success: function(data) {
                    // console.log(data);

                    if (data["json_data_exist"] == "Y") {
                        //แจ้งเตือนชื่อหมวดเงินซ้ำ
                        show_warning(
                            "ในประเภทหมวดเงินนี้ ชื่อดังกล่าวถูกใช้ไปแล้ว <br> กรุณาตรวจสอบชื่อหมวดเงินอีกครั้ง"
                        );
                    } //if
                    else {
                        $("#modal_add_main_category").modal('hide');

                        //clear ค่าใน Modal
                        $('#bc_name_main').val("");
                        $('input[name="money_type_insert"]').prop('checked', false);
                        get_data();

                    } //else

                }
            }); //ajax
        } //else

    } //insert_main_category

    /*
     * show_warning
     * แสดง alert ตามข้อความที่ส่งมา
     * @input message
     * @output -
     * @author 61160077 Siripoon Yimthanom
     * @Create Date 2563-11-19
     */

    function show_warning(message) {

        Swal.fire({
            title: '<span style = "font-size: 24px; font-weight: normal;" >' + message + '</span>',
            text: "",
            //icon: 'warning',
            type: 'warning',

            showConfirmButton: true,
            confirmButtonText: 'ตกลง',
            confirmButtonColor: '#3085d6',
            focusConfirm: true,

        }).then((result) => {
            if (result.value) {

            } //if
        })

    } //show_warning

    // ==========================================================================================================
    // ==========================================================================================================
    // ==========================================================================================================

    /*  แก้ไขข้อมูลใน database  */

    /*
     * update_main_category
     * แก้ไขหมวดเงินหลัก
     * @input ข้อมูลหมวดเงินหลัก
     * @output -
     * @author 61160194 Wuttichai Chaiwanna, 61160182 Nawarut Nambunsri
     * @Create Date 2563-11-20
     */

    function update_main_category() {

        var bc_id_edit = $('#bc_id_edit').val(); //id หมวดเงิน
        var default_bc_name_edit = $('#default_bc_name_edit').val(); //ชื่อเดิมของหมวดเงิน

        var bc_name_edit = $('#bc_name_edit').val().trim(); //ชื่อใหม่ของหมวดเงิน
        var bc_mt_id = $('input[name="money_type_update"]:checked').val(); //id ประเภทหมวดเงิน

        var check_fill_status = $('.checkbox_edit_modal:checked').length > 0; //ตรวจสอบcheckboxถูกเลือกหรือไม่

        var new_name = "Y"; // Y = มีการเปลี่ยนชื่อหมวดเงินเป็นชื่อใหม่, N = ใช่ชื่อหมวดเงินเดิม
        if (default_bc_name_edit == bc_name_edit) {
            new_name = "N";
        } //if

        //ตรวจสอบว่าลืมกรอกข้อมูลอะไรบ้าง
        var message = "";
        if (bc_name_edit == "" && check_fill_status == false) {
            message = "กรุณากรอกชื่อรายการ <br> และเลือกประเภทรายการ";
        } //if
        else if (bc_name_edit == "") {
            message = "กรุณากรอกชื่อรายการ";
        } //else if
        else if (check_fill_status == false) {
            message = "กรุณาเลือกประเภทรายการ";
        } //else if

        if (message != "") {
            //แจ้งเตือนกรอกข้อมูลไม่ครบ
            show_warning(message);
        } //if
        else {
            console.log(bc_id_edit)
            console.log(new_name)
            console.log(bc_name_edit)
            console.log(bc_mt_id)
            $.ajax({
                type: "post",
                url: "<?php echo site_url() . "/" . $this->config->item('ac_money_main') ?>update_money_category_main_ajax",
                data: {
                    'new_name': new_name,
                    'bc_id_edit': bc_id_edit,
                    'bc_name_edit': bc_name_edit,
                    'bc_mt_id': bc_mt_id,
                    'bc_us_id': 1
                },
                dataType: "JSON",
                success: function(data) {
                    // console.log(data);

                    if (data["json_data_exist"] == "Y") {
                        //แจ้งเตือนชื่อหมวเงินซ้ำ
                        show_warning("ในประเภทรายการนี้ ชื่อดังกล่าวถูกใช้ไปแล้ว <br> กรุณาตรวจสอบชื่อรายการอีกครั้ง");
                    } //if
                    else {
                        //เคลียร์ข้อมูลใน modal
                        $("#modal_edit_main_category").modal('hide');
                        $('#bc_name_main').val("");

                        get_data();

                    } //else
                }
            }); //ajax
        } //else

    } //update_main_category

    /*
     * set_edit_modal_main
     * เรียกข้อมูลเมื่อแก้ไขหมวดเงินหลัก
     * @input 
     * @output -
     * @author 61160194 Wuttichai Chaiwanna, 61160182 Nawarut Nambunsri
     * @Create Date 2563-11-20
     */

    function set_edit_modal_main(bc_id, bc_name, bc_mt_id) {

        $('#default_bc_name_edit').val(bc_name); //set ชื่อเดิมของหมวดเงิน
        $('#bc_name_edit').val(bc_name); //set ชื่อหมวดเงิน
        $('#bc_id_edit').val(bc_id); //set id หมวดเงิน

        //set ประเภทหมวดเงิน
        switch (bc_mt_id) {
            case "1":
                //ราายรับ
                $('#edit_income').prop('checked', true);
                break;
            default:
                //รายจ่าย
                $('#edit_expense').prop('checked', true);
        } //switch

    } //set_edit_modal_main

    // ==========================================================================================================
    // ==========================================================================================================
    // ==========================================================================================================

    /*  ลบข้อมูลใน database  */

    /*
     * confirm_delete_main_category
     * แสดง alert เพื่อให้กดยืนยันหรือยกเลิกการลบหมวดเงินหลัก
     * @input mc_id
     * @output -
     * @author 61160194 Wuttichai Chaiwanna, 61160182 Nawarut Nambunsri
     * @Create Date 2563-11-20
     */

    function confirm_delete_main_category(bc_id) {

        Swal.fire({
            title: '<span style = "font-size: 24px; font-weight: normal;" > รายการนี้ได้มีการใช้งานอยู่<br>ท่านต้องการลบจริง ๆ หรือไม่ </span>',
            text: "",
            //icon: 'warning',
            type: 'warning',

            showCloseButton: true,

            showConfirmButton: true,
            confirmButtonText: 'ตกลง',
            confirmButtonColor: '#3085d6', //#4caf50
            //focusConfirm: true,

            showCancelButton: true,
            cancelButtonText: 'ยกเลิก',
            cancelButtonColor: '#d33',
            focusCancel: true,

            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                //ลบหมวดเงิน
                delete_main_category(bc_id);

            } //if
        }) //Swal

    } //confirm_delete_main_category

    /*
     * delete_main_category
     * ลบหมวดเงินหลัก และหมวดเงินย่อยที่อยู่หลักนี้
     * @input mc_id
     * @output -
     * @author 61160194 Wuttichai Chaiwanna, 61160182 Nawarut Nambunsri
     * @Create Date 2563-11-20
     */

    function delete_main_category(bc_id) {

        $.ajax({
            type: "post",
            url: "<?php echo site_url() . "/" . $this->config->item('ac_money_main') ?>delete_money_category_main_ajax",
            data: {
                'bc_id': bc_id
            },
            dataType: "JSON",
            success: function(data) {

                Swal.fire({
                    title: 'ลบเสร็จสิ้น',
                    type: 'success',

                    showConfirmButton: true,
                    confirmButtonText: 'ตกลง',
                    confirmButtonColor: '#3085d6'
                    //focusConfirm: true
                })
                get_data();
            }
        }); //ajax

    } //delete_main_category
    </script>