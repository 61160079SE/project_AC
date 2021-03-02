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
    create_table();
});


function create_table() {

    let html_code = "";
    html_code += ' <table class="table table-striped table-color-header table-hover table-border" cellspacing="0" width="100%" style="width:100%">';
    html_code += ' <thead class=" text-primary">';
    html_code += ' <tr style="text-align : center">';
    html_code += ' <th class="head_color">&emsp;วันที่</th>';
    html_code += ' <th class="head_color" >รายรับ (บาท)</th>';
    html_code += ' <th class="head_color">รายจ่าย (บาท)</th>';
    html_code += ' <th class="head_color">คงเหลือ (บาท)</th>';
    html_code += ' <th class="head_color">ดำเนินการ</th>';
    html_code += ' </tr>';
    html_code += ' </thead>';
    html_code += ' <tbody>';
    html_code += ' <tr>';
    html_code += ' <td style="text-align : center">1</td>';
    html_code += ' <td style="text-align : right">15,000.00</td>';
    html_code += ' <td style="text-align : right">12,000.00 </td>';
    html_code += ' <td style="text-align : right">3,000.00 </td>';

    html_code += ' <td style="text-align : center">';
    html_code += '<a href="<?php echo site_url() . "/" . $this->config->item("ac_daily_detail") ?>show_daily_detail">'
    html_code += '<button class="btn btn-primary acr_button" style="margin:5px;">'
    html_code += '<i class="material-icons">search</i>'
    html_code += '</button>'
    html_code += '</a>'
    html_code += '</td>'
    html_code += ' </tr>';
    html_code += ' <tr>';
    html_code += ' <td style="text-align : center">2</td>';
    html_code += ' <td style="text-align : right">500.00</td>';
    html_code += ' <td style="text-align : right">200.00 </td>';
    html_code += ' <td style="text-align : right">3,300.00 </td>';

    html_code += ' <td style="text-align : center">';
    html_code += '<a href="<?php echo site_url() . "/" . $this->config->item("ac_daily_detail") ?>show_daily_detail">'
    html_code += '<button class="btn btn-primary acr_button" style="margin:5px;">'
    html_code += '<i class="material-icons">search</i>'
    html_code += '</button>'
    html_code += '</a>'
    html_code += '</td>'
    html_code += ' </tr>';
    html_code += ' <tr>';
    html_code += ' <td style="text-align : center">3</td>';
    html_code += ' <td style="text-align : right">500.00</td>';
    html_code += ' <td style="text-align : right">300.00 </td>';
    html_code += ' <td style="text-align : right">3,500.00 </td>';

    html_code += ' <td style="text-align : center">';
    html_code += '<a href="<?php echo site_url() . "/" . $this->config->item("ac_daily_detail") ?>show_daily_detail">'
    html_code += '<button class="btn btn-primary acr_button" style="margin:5px;">'
    html_code += '<i class="material-icons">search</i>'
    html_code += '</button>'
    html_code += '</a>'
    html_code += '</td>'
    html_code += ' </tr>';
    html_code += ' </tbody>';
    html_code += ' </table>';

    $('#table_daily').html(html_code);

}
</script>