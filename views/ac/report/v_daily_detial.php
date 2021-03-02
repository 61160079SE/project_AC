<script>
var gl_sum_income = 0;
var gl_sum_expense = 0;
</script>
<div id=" slie12 ">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    วันเดือนปี
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
    </div>
</div>

<script>
$(document).ready(function() {
    get_list_money();
});
/*
 * get_list_money
 * ดึงข้อมูลรายการเงิน
 * @input -
 * @output -
 * @author 61160173 Jirawat yuenkaew
 * @Create Date 2564-03-02
 */
function get_list_money() {
    $.ajax({
        type: "post",
        url: "<?php echo site_url() . "/" . $this->config->item('ac_daily_detail') ?>get_list_money_ajax",
        data: {
            'date': "2564-01-12",
            'user_id': 1
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
    let sum_money = 0;
    if (money_data == "no_data") {
        html_code += 'ไม่มีข้อมูล ';
    } else {
        html_code += '<table class="table table-striped table-color-header table-hover table-border" cellspacing="0" width="100%" style="width:100%">';
        html_code += '   <thead class=" text-primary">';
        html_code += '     <tr>'
        html_code += '        <th class="head_color" style="text-align : center">ลำดับ</th>';
        if (money_type == 1) {
            html_code += '         <th class="head_color" style="text-align :h left">รายการรายรับ</th>'
        } else {
            html_code += '         <th class="head_color" style="text-align :h left">รายการรายจ่าย</th>'
        };
        html_code += '<th class="head_color" style="text-align : center">จำนวนเงิน (บาท)</th>';
        html_code += '</tr>';
        html_code += '</thead>';
        html_code += '<tbody>';
        money_data.forEach((row, index) => {
            html_code += '<tr>';
            html_code += '<td style="text-align : center">' + (index + 1) + '</td>';
            if (row.lm_customize_category != null) {
                html_code += '<td style="text-align : left">' + row.lm_customize_category + '</td>';
            } else {
                html_code += '<td style="text-align : left">' + row.bc_name + '</td>';
            }
            html_code += '<td style="text-align : right" colspan="5"> ' + formatNumber(row.lm_money) + ' </td>';
            html_code += '</tr>';
            sum_money += parseFloat(row.lm_money);
        }); //foreach
        html_code += '<tr>';
        html_code += '<td>';
        html_code += '</td>';
        html_code += '<td td style="text-align : center" > รวม';
        html_code += '</td>';
        html_code += '<td style="text-align : right " colspan="5"> ' + formatNumber(sum_money) + ' </td>';
        html_code += '</tr>';
        html_code += '</tbody>';
        html_code += '</table>';
    }
    if (money_type == 1) {
        $('#table_income').html(html_code)
        $('#income_money').html(formatNumber(sum_money) + "  ฿")
        gl_sum_income = sum_money;
    } else {
        $('#table_expense').html(html_code)
        $('#expense_money').html(formatNumber(sum_money) + "  ฿")
        $('#remaining_budget').html(formatNumber(gl_sum_income - sum_money) + "  ฿")
        gl_sum_expense = sum_money;
    };

} //create_table
</script>