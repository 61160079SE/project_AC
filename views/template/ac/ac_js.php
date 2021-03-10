<!-- Plugin -->

<!-- Datatables -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugin/DataTables/datatables.min.js"></script>

<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<script>
// จัดรูปแบบตัวเลข

/*
 * formatNumber
 * จัดรูปแบบเลข
 * @input ตัวเลข
 * @output เลขทศนิยม 2 ตำแหน่ง
 * @author 61160079 Adithep Phompha
 * @Create Date -
 */

function formatNumber(number) {
    number = parseFloat(number).toFixed(2)
    return number.toString().replaceAll(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
} //formatNumber

/*
 * remove_comma
 * เอา comma ออก
 * @input ตัวเลข
 * @output เลขที่ไม่มี comma
 * @author 61160079 Adithep Phompha
 * @Create Date 2563-01-16
 */

function remove_comma(number) {
    return number.replaceAll(',', '');
} //remove_comma

// ==========================================================================================================
// ==========================================================================================================
// ==========================================================================================================


/*
 *convert_date_to_month
 *แปลง  date เป็น เดือน
 *@input id name
 *@output show datatable aos style
 *@author Adithep
 *@Create Date 2564-03-03
 *Original Nutchapon
 */


function convert_date_to_month(date) {
    let month = " ";
    let arr_date = date.split("-");
    let month_number = arr_date[1];
    if (month_number == "01") {
        month = "มกราคม";
    } else if (month_number == "02") {
        month = "กุมภาพันธ์";
    } else if (month_number == "03") {
        month = "มีนาคม";
    } else if (month_number == "04") {
        month = "เมษายม";
    } else if (month_number == "05") {
        month = "พฤษภาคม";
    } else if (month_number == "06") {
        month = "มิถุนายน";
    } else if (month_number == "07") {
        month = "กรกฎาคม";
    } else if (month_number == "08") {
        month = "สิงหาคม";
    } else if (month_number == "09") {
        month = "กันยายน";
    } else if (month_number == "10") {
        month = "ตุลาคม";
    } else if (month_number == "11") {
        month = "พฤษจิกายน";
    } else if (month_number == "12") {
        month = "ธันวาคม";
    }
    return month;
}
// ==========================================================================================================
// ==========================================================================================================
// ==========================================================================================================


/*
 *make_dataTable_byId
 *@input id name
 *@output show datatable aos style
 *@author Adithep
 *@Create Date 2564-03-03
 *Original Nutchapon
 */


function make_dataTable_byId(id_name) {

    var datatable = $('#' + id_name).DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [10, 25, 50, -1],
            [10, 25, 50, "ทั้งหมด"]
        ],
        responsive: true,
        language: {
            lengthMenu: "แสดง _MENU_ รายการ",
            emptyTable: "ไม่พบข้อมูลในตาราง",
            search: "ค้นหา :_INPUT_",
            searchPlaceholder: "ค้นหาข้อมูลในตาราง...",
            info: "แสดงหน้าที่ _START_ จาก _PAGES_ หน้า ทั้งหมด _TOTAL_ รายการ",
            infoEmpty: "แสดงหน้าที่ 0 จาก 0 หน้า รายการทั้งหมด 0 รายการ",
            zeroRecords: "ไม่พบข้อมูลที่ค้นหาในตาราง",
            infoFiltered: "",
            paginate: {
                "first": "",
                "last": "",
                "next": "หน้าถัดไป",
                "previous": "ก่อนหน้า"
            },
        },
    });

    return datatable;
} //make_dataTable_byId

// ==========================================================================================================
// ==========================================================================================================
// ==========================================================================================================

/*
 *logout
 *@input -
 *@output logout and goto login page
 *@author 61160082 Areerat Pongurai
 *@Create Date 2564-03-11
 */

function logout() {
    $.ajax({
        type: "POST",
        url: "<?php echo site_url() . "/" . $this->config->item('ac_logout') ?>logout_ajax",
        data: {},
        dataType: "JSON",
        success: function(response) {
            window.location.href = "<?php echo site_url() . "/" . $this->config->item('ac_login') ?>show_login";
        }
    }); //ajax
} //logout
</script>