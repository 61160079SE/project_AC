<div class="card">
    <div class="card-header card-header-icon card-header-primary">
        <div class="card-icon">
            <i class="material-icons">assignment</i>

        </div>

        <h3 class="card-title ">
            <span id="table_name">ตารางสรุปผล (รายวัน) : ปี พ.ศ. 2564 เดือน มกราคม</span><br>

        </h3>
        <h4 class="card-title ">
            <text style="float:right;"> ยอดเงินคงเหลือเดือน (ธันวาคม) : 2000 บาท </text>
        </h4>
    </div>
    <div class="card-body">
        <div id="table_month">
            <div id="table_daily" style="margin-top: 20px; margin-bottom: 20px;">

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

function get_daily_money() {
    $.ajax({
        type: "post",
        url: "<?php echo site_url() . "/" . $this->config->item('ac_daily_summary') ?>get_daily_money_ajax",
        data: {
            'year': 2564,
            'user_id': 1,
            'month': 1
        },
        dataType: "JSON",
        success: function(json_data) {
            console.log(json_data);
            create_table(json_data["daily_money"]);
        }
    }); //ajax
}

/*
 * create_table
 * สร้างตาราง
 * @input -
 * @output -
 * @author 61160077 Siripoon Yimthanom
 * @Create Date 2564-03-02
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
        html_code += '<a href="<?php echo site_url() . "/" . $this->config->item("ac_daily_detail") ?>show_daily_detail">'
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
    make_dataTable_byId('datatable_daily');
}
</script>