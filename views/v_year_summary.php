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
    $(document).ready(function(){
        create_table()
    })

    function create_table(){
        let mock_data = [{
                year: '2564',
                income: '56,000.00',
                outcome: '38,000.00',
                total: '15,500.00'
            },
            {
                year: '2563',
                income: '16,000.00',
                outcome: '14,000.00',
                total: '2,000.00'
            },
            {
                year: '2562',
                income: '26,000.00',
                outcome: '24,000.00',
                total: '2,000.00'
            }
        ]
        let html_table = ''
        $.each(mock_data, function (index, val) { 
            html_table += '<tr>'
            html_table += '<td class="text-center">'+ val.year +'</td>'
            html_table += '<td class="text-right">'+ val.income +'</td>'
            html_table += '<td class="text-right">'+ val.outcome +'</td>'
            html_table += '<td class="text-right">'+ val.total +'</td>'
            html_table += '<td class="text-center">'
            html_table += '<a target="_blank" href="">'   
            html_table += '<button class="btn btn-primary" style="margin:5px;">'
            html_table += '<i class="material-icons">search</i>'
            html_table += '</button>'
            html_table += '</a>'
            html_table += '</td>'
            html_table += '</tr>'
        });

        $('#table-summary-year tbody').html(html_table)
        
    }
</script>