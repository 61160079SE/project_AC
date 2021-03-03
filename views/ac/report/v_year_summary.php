<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-icon card-header-primary">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <h3 class="card-title ">
                <span id="table_name">ตารางสรุปผล (รายปี)</span>
            </h3>
        </div>
        <div class="card-body">
            <div id="table_month">
                <div style="margin-top: 20px; margin-bottom: 20px;">
                    <table id="table-summary-year" class="table table-striped table-color-header table-hover table-border" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center">ลำดับ</th>
                                <th class="text-center">ปี</th>
                                <th class="text-center">รายรับ (บาท)</th>
                                <th class="text-center">รายจ่าย (บาท)</th>
                                <th class="text-center">คงเหลือ (บาท)</th>
                                <th class="text-center">ดำเนินการ</th>
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
    get_year_money()
})

/*
 * get_year_money
 * ดึงข้อมูลรายการเงิน
 * @input -
 * @output -
 * @author 60160341 Preeyanut Boonmeemak
 * @Create Date 2564-03-02
 */
function get_year_money() {
    $.ajax({
        type: "post",
        url: "<?php echo site_url() . "/" . $this->config->item('ac_year_summary') ?>get_year_money_ajax",
        data: {
            'user_id': 1
        },
        dataType: "JSON",
        success: function(json_data) {
            create_table(json_data["year_money"]);
        }
    }); //ajax
}

/*
 * create_table
 * สร้างตารางสรุปผลรายปี
 * @input -
 * @output หน้าจอสรุปผลรายปี
 * @author 60160341 Preeyanut Boonmeemak
 * @Create Date 2564-03-02
 */
function create_table(data) {
    let html_table = ''
    if(data !== "no_data"){
        $.each(data, function(index, val) {
            html_table += '<tr>'
            html_table += '<td class="text-center">' + (index + 1) + '</td>'
            html_table += '<td class="text-center">' + (parseInt(val.sum_year) + 543) + '</td>'
            html_table += '<td class="text-right">' + formatNumber(val.sum_income) + '</td>'
            html_table += '<td class="text-right">' + formatNumber(val.sum_expense) + '</td>'
            html_table += '<td class="text-right">' + formatNumber(val.sum_income - val.sum_expense) + '</td>'
            html_table += '<td class="text-center">'
            html_table += '<a href="<?php echo site_url() . "/" . $this->config->item("ac_month_summary") ?>show_month_summary">'
            html_table += '<button class="btn btn-primary acr_button" style="margin:5px;">'
            html_table += '<i class="material-icons">search</i>'
            html_table += '</button>'
            html_table += '</a>'
            html_table += '</td>'
            html_table += '</tr>'
        });
    }
    

    $('#table-summary-year tbody').html(html_table)
    make_dataTable_byId('table-summary-year')

}
</script>