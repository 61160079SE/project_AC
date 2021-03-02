<div id=" slie12 ">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <input type="date" name="" id="">
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
                        <div class="col-md-7" id="income_money" style="text-align:right">23,537,303.10 ฿</div>
                        <!-- รายจ่าย -->
                        <div class="col-md-5">
                            <div class="row"><i class="material-icons">equalizer</i>  รายจ่าย : </div>
                        </div>
                        <div class="col-md-7" id="expense_money" style="text-align:right">0.00 ฿</div>
                        <!-- คงเหลือ -->
                        <div class="col-md-5">
                            <div class="row"><i class="material-icons">equalizer</i>  คงเหลือ : </div>
                        </div>
                        <div class="col-md-7" id="remaining_budget" style="text-align:right">23,537,303.10 ฿</div>
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
    create_table(1, "data");
    create_table(2, "data");
});

function create_table(money_type, data) {
    let html_code = "";

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
    html_code += '<tr>';
    html_code += '<td style="text-align : center">1</td>';
    html_code += '<td style="text-align : left">เงินจากที่ทำงานพิเศษ</td>';
    html_code += '<td style="text-align : center" colspan="5"> 7,500.00 </td>';
    html_code += '</tr>';
    html_code += '<tr>';
    html_code += '<td style="text-align : center">2</td>';
    html_code += '<td style="text-align : left">เงินจากพ่อแม่</td>';
    html_code += '<td style="text-align : center" colspan="5"> 7,000.00 </td>';
    html_code += '</tr>';
    html_code += '<tr>';
    html_code += '<td style="text-align : center">3</td>';
    html_code += '<td style="text-align : left">ญาติให้ค่าขนมมา</td>';
    html_code += '<td style="text-align : center" colspan="5"> 500.00 </td>';
    html_code += '</tr>';
    html_code += '<tr>';
    html_code += '<td style="text-align : left"></td>';
    html_code += '<td style="text-align : center">รวม</td>';
    html_code += '<td style="text-align : center" colspan="5"> 15,000.00 </td>';
    html_code += '</tr>';
    html_code += '</tbody>';
    html_code += '</table>';

    if (money_type == 1) {
        $('#table_income').html(html_code)
    } else {
        $('#table_expense').html(html_code)
    };

} //create_table
</script>