<!-- /*
 * v_daily_summary
 * ดูผลสรุปรายวัน
 * @author 61160077 Siripoon Yimthanom
 * @Create 2564-03-02
 */ -->

<input type="hidden" id="year" value="<?php echo $year; ?>">
<input type="hidden" id="month" value="<?php echo $month; ?>">
<script>
var gl_year = $("#year").val(); //ปี
var gl_month = $("#month").val(); //เดือน
</script>

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
                    <a href="<?php echo site_url() . "/" . $this->config->item('ac_year_summary') ?>show_year_summary">
                        สรุปผลทางบัญชีรายปี
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="<?php echo site_url() . "/" . $this->config->item('ac_month_summary') ?>show_month_summary">
                        สรุปผลทางบัญชีรายเดือน
                    </a>
                </li>
                <li class="breadcrumb-item active">
                    สรุปผลทางบัญชีรายวัน
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->

<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon card-header-primary">
            <div class="card-icon">
                <i class="material-icons">assignment</i>

            </div>

            <h3 class="card-title ">
                <span id="table_name"></span><br>

            </h3>
            <!-- <h4 class="card-title ">
                  <text style="float:right;"> ยอดเงินคงเหลือเดือน (ธันวาคม) : 2000 บาท </text>
            </h4> -->
        </div>
        <div class="card-body">
            <div id="table_month">
                <div id="table_daily" style="margin-top: 20px; margin-bottom: 20px;">

                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    get_daily_money();
});

/*
 * get_daily_money
 * ดึงข้อมูลรายการเงิน
 * @input -
 * @output -
 * @author 61160077 Siripoon Yimthanom
 * @Create Date 2564-03-02
 */
/*
 * get_daily_money
 * ดึงข้อมูลรายการเงิน
 * @input -
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Update Date 2564-03-12
 */

function get_daily_money() {
    $.ajax({
        type: "post",
        url: "<?php echo site_url() . "/" . $this->config->item('ac_daily_summary') ?>get_daily_money_ajax",
        data: {
            'year': gl_year,
            'user_id': <?php echo $_SESSION['us_id']; ?>,
            'month': (parseInt(gl_month))
        },
        dataType: "JSON",
        success: function(json_data) {
            // console.log(json_data);
            create_table(json_data["daily_money"]);
        }
    }); //ajax
} //get_daily_money

/*
 * create_table
 * สร้างตาราง
 * @input -
 * @output -
 * @author 61160077 Siripoon Yimthanom
 * @Create Date 2564-03-02
 */
/*
 * create_table
 * สร้างตาราง
 * @input -
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Update Date 2564-03-12
 */

function create_table(daily_money) {

    let html_code = "";
    html_code += ' <table id="datatable_daily" class="table table-striped table-color-header table-hover table-border" cellspacing="0"  style="width:100%">';
    html_code += ' <thead class=" text-primary">';
    html_code += ' <tr style="text-align : center">';
    html_code += ' <th class="head_color">&emsp;ลำดับ</th>';
    html_code += ' <th class="head_color">&emsp;วันที่</th>';
    html_code += ' <th class="head_color" >รายรับ (บาท)</th>';
    html_code += ' <th class="head_color">รายจ่าย (บาท)</th>';
    html_code += ' <th class="head_color">คงเหลือ (บาท)</th>';
    html_code += ' <th class="head_color">ดำเนินการ</th>';
    html_code += ' </tr>';
    html_code += ' </thead>';
    html_code += ' <tbody>';

    $.each(daily_money, function(index, val) {
        let remaining_buget = val.sum_income - val.sum_expense;
        let arr_date = val.dm_date.split("-");
        html_code += ' <tr>';
        html_code += ' <td style="text-align : center">' + (index + 1) + '</td>';
        html_code += ' <td style="text-align : center">' + arr_date[2] + '</td>';
        html_code += ' <td style="text-align : right">' + val.sum_income + '</td>';
        html_code += ' <td style="text-align : right">' + val.sum_expense + '</td>';
        html_code += ' <td style="text-align : right">' + remaining_buget + '</td>';
        html_code += ' <td style="text-align : center">';
        html_code += '<a href="<?php echo site_url() . "/" . $this->config->item("ac_daily_detail") ?>show_daily_detail/' + val.dm_date + '">'
        html_code += '<button class="btn btn-primary acr_button" style="margin:5px;">'
        html_code += '<i class="material-icons">search</i>'
        html_code += '</button>'
        html_code += '</a>'
        html_code += '</td>'
        html_code += ' </tr>';
    });
    html_code += ' </tbody>';
    html_code += ' </table>';


    $('#table_daily').html(html_code);
    $('#table_name').html("ตารางสรุปผลทางบัญชีรายวัน เดือน" + convert_month(gl_month) + " ประจำปี พ.ศ." + gl_year);
    make_dataTable_byId('datatable_daily');
} //end create_table
</script>