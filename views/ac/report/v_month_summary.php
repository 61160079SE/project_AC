<?php
/*
 * v_month_summary
 * controller สรุปผลรายเดือน
 * @author 61160182 Nawarut Nambunsri
 * @Create Date 2564-03-02
 */
?>

<div class="card">
    <div class="card-header card-header-icon card-header-primary">
        <div class="card-icon">
            <i class="material-icons">assignment</i>
        </div>

        <h3 class="card-title ">
            <span id="table_name">ตารางสรุปผล (รายเดือน) : ปี 2564</span>

        </h3>

    </div>
    <div class="card-body">

        <div id="table_month">
            <div style="margin-top: 20px; margin-bottom: 20px;">
                <table class="table table-striped table-color-header table-hover table-border" cellspacing="0" width="100%" style="width:100%">

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

<script>
$(document).ready(function() {
    get_month_money();
});
/*
 * get_month_money
 * ดึงข้อมูลรายการเงิน
 * @input -
 * @output -
 * @author 61160182 Nawarut Nambunsri
 * @Create Date 2564-03-02
 */
function get_month_money() {
    $.ajax({
        type: "post",
        url: "<?php echo site_url() . "/" . $this->config->item('ac_month_summary') ?>get_month_money_ajax",
        data: {
            'year': 2564,
            'user_id': 1
        },
        dataType: "JSON",
        success: function(json_data) {
            console.log(json_data);
            create_table(json_data["month_money"]);
        }
    }); //ajax
}


/*
 * create_table
 * สร้างตารางสรุปผลรายเดือน
 * @input -
 * @output หน้าจอสรุปผลรายเดือน
 * @author 61160182 Nawarut Nambunsri
 * @Create Date 2564-03-02
 */
function create_table(month_money) {
    let html_table = ""
    $.each(month_money, function(index, val) {
        let remaining_buget = val.sum_income - val.sum_expense;
        html_table += '<tr>'
        html_table += '<td class="text-center">' + (index + 1) + '</td>'
        html_table += '<td class="text-left">' + convert_date_to_month(val.dm_date) + '</td>'
        html_table += '<td class="text-right">' + formatNumber(val.sum_income) + '</td>'
        html_table += '<td class="text-right">' + formatNumber(val.sum_expense) + '</td>'
        html_table += '<td class="text-right">' + formatNumber(remaining_buget) + '</td>'
        html_table += '<td class="text-center">'
        html_table += '<a href="<?php echo site_url() . "/" . $this->config->item("ac_daily_summary") ?>show_daily_summary">'
        html_table += '<button class="btn btn-primary acr_button" style="margin:5px;">'
        html_table += '<i class="material-icons">search</i>'
        html_table += '</button>'
        html_table += '</a>'
        html_table += '</td>'
        html_table += '</tr>'
    });
    $('#table_month tbody').html(html_table)
} //create_table
</script>