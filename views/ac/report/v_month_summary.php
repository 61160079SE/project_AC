<?php
/*
 * v_month_summary
 * controller สรุปผลรายเดือน
 * @author 61160182 Nawarut Nambunsri
 * @Create Date 2564-03-02
 */
?>

<input type="hidden" id="year" value="<?php echo $year; ?>">
<script>
var gl_year = $("#year").val(); //ปี
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
                    สรุปผลทางบัญชีรายเดือน
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
                <span id="table_name"></span>

            </h3>

        </div>
        <div class="card-body">

            <div id="table_month">
                <div style="margin-top: 20px; margin-bottom: 20px;">
                    <table class="table table-striped table-color-header table-hover table-border" id="datatable_month" cellspacing="0" width="100%" style="width:100%">

                        <thead class=" text-primary">
                            <tr>
                                <th class="head_color" style="text-align : center">ลำดับ</th>
                                <th class="head_color" style="text-align : center">เดือน</th>
                                <th class="head_color" style="text-align : center">รายรับ (บาท)</th>
                                <th class="head_color" style="text-align : center">รายจ่าย (บาท)</th>
                                <th class="head_color" style="text-align : center">คงเหลือ (บาท)</th>
                                <th class="head_color" style="text-align : center">ดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    get_month_money();
});
/*
 * get_month_money
 * ดึงข้อมูลเงินรายเดือน
 * @input -
 * @output -
 * @author 61160182 Nawarut Nambunsri
 * @Create Date 2564-03-02
 */
/*
 * get_month_money
 * ดึงข้อมูลเงินรายเดือน
 * @input -
 * @output -
 * @author 61160082 Areerat Pongurai
 * @Update Date 2564-03-12
 */
function get_month_money() {
    $.ajax({
        type: "post",
        url: "<?php echo site_url() . "/" . $this->config->item('ac_month_summary') ?>get_month_money_ajax",
        data: {
            'year': gl_year,
            'user_id': <?php echo $_SESSION['us_id']; ?>
        },
        dataType: "JSON",
        success: function(json_data) {
            // console.log(json_data);
            create_table(json_data["month_money"]);
        }
    }); //ajax
} //function get_month_money


/*
 * create_table
 * สร้างตารางสรุปผลรายเดือน
 * @input -
 * @output หน้าจอสรุปผลรายเดือน
 * @author 61160182 Nawarut Nambunsri
 * @Create Date 2564-03-02
 */
/*
 * create_table
 * สร้างตารางสรุปผลรายเดือน
 * @input -
 * @output หน้าจอสรุปผลรายเดือน
 * @author 61160082 Areerat Pongurai
 * @Update Date 2564-03-12
 */
function create_table(month_money) {
    let html_table = ""
    $.each(month_money, function(index, val) {
        let remaining_buget = val.sum_income - val.sum_expense;
        let arr_date = val.dm_date.split("-");
        let month_number = arr_date[1];
        html_table += '<tr>'
        html_table += '<td class="text-center">' + (index + 1) + '</td>'
        html_table += '<td class="text-left">' + convert_date_to_month(val.dm_date) + '</td>'
        html_table += '<td class="text-right">' + formatNumber(val.sum_income) + '</td>'
        html_table += '<td class="text-right">' + formatNumber(val.sum_expense) + '</td>'
        html_table += '<td class="text-right">' + formatNumber(remaining_buget) + '</td>'
        html_table += '<td class="text-center">'
        html_table += '<a href="<?php echo site_url() . "/" . $this->config->item("ac_daily_summary") ?>show_daily_summary/' + gl_year + '/' + month_number + '">'
        html_table += '<button class="btn btn-primary acr_button" style="margin:5px;">'
        html_table += '<i class="material-icons">search</i>'
        html_table += '</button>'
        html_table += '</a>'
        html_table += '</td>'
        html_table += '</tr>'
    });
    $('#table_month tbody').html(html_table);
    $('#table_name').html("ตารางสรุปผลทางบัญชีรายเดือน ประจำปี พ.ศ." + gl_year);
    make_dataTable_byId('datatable_month');

} //create_table
</script>