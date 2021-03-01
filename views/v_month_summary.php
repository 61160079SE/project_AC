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
    create_table();
});

function create_table() {
    let mock_data = [{
        month: 'มกราคม',
        income: '30,000.00',
        outcome: '20,000.00',
        total: '10,000.00'
    }, {
        month: 'กุมภาพันธ์',
        income: '30,000.00',
        outcome: '20,000.00',
        total: '20,000.00'
    }]
    let html_table = ""
    $.each(mock_data, function(index, val) {
        html_table += '<tr>'
        html_table += '<td class="text-center">' + (index + 1) + '</td>'
        html_table += '<td class="text-left">' + val.month + '</td>'
        html_table += '<td class="text-right">' + val.income + '</td>'
        html_table += '<td class="text-right">' + val.outcome + '</td>'
        html_table += '<td class="text-right">' + val.total + '</td>'
        html_table += '<td class="text-center">'
        html_table += '<button class="btn btn-primary acr_button" style="margin:5px;">'
        html_table += '<i class="material-icons">search</i>'
        html_table += '</button>'
        html_table += '</td>'
        html_table += '</tr>'
    });
    $('#table_month tbody').html(html_table)
}
</script>