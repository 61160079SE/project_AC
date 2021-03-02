<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->


<!-- wizard tab -->

<style>
.tab_active_font {
    color: #FFF !important;
}
</style>

<script>
// $(document).ready(function() {

//     /*  wizzard_tab  */

//     select_tab1(); //ให้ default คือ tab แรก

//     $("#wizzard_tab1").click(function() {
//         select_tab1();
//     }); //wizzard_tab1
//     $("#wizzard_tab2").click(function() {
//         select_tab2();
//     }); //wizzard_tab2
//     $("#wizzard_tab3").click(function() {
//         select_tab3();
//     }); //wizzard_tab3


//     /*  wizzard_button  */

//     $("#tab1_button_next").click(function() {
//         select_tab2();
//     }); //tab1_button_next
//     $("#tab2_button_next").click(function() {
//         select_tab3();
//     }); //tab2_button_next
//     $("#tab2_button_previous").click(function() {
//         select_tab1();
//     }); //tab2_button_previous
//     $("#tab3_button_previous").click(function() {
//         select_tab2();
//     }); //tab3_button_previous

// }); // document ready


/*  wizzard_tab  */

/*
 * select_tab1
 * เลือก tab 1
 * @input -
 * @output -
 * @author 61160079 Adithep Phompha
 * @Create Date -
 */

function select_tab1() {
    /*  wizzard_tab  */
    $("#wizzard_tab1").addClass("nav-item-wizard-aos");
    $("#wizzard_tab2, #wizzard_tab3").removeClass("nav-item-wizard-aos");

    /*  wizzard_icon  */
    $("#tab_icon_1").addClass("border-wizard-aos");
    $("#tab_icon_1").removeClass("border-wizard2-aos");

    $("#tab_icon_2, #tab_icon_3").addClass("border-wizard2-aos");
    $("#tab_icon_2, #tab_icon_3").removeClass("border-wizard-aos");


    /*  wizzard_tab_font  */
    $("#tab_font_1").addClass("tab_active_font");
    $("#tab_font_2, #tab_font_3").removeClass("tab_active_font");

    /*  wizzard_body  */
    $("#wizard_body_income").addClass("active");
    $("#wizard_body_expense, #wizard_body_future_payment").removeClass("active");

    /*  wizzard_button  */
    $(".tab1_button").show();
    $(".tab2_button").hide();
    $(".tab3_button").hide();
} //select_tab1

/*
 * select_tab2
 * เลือก tab 2
 * @input -
 * @output -
 * @author 61160079 Adithep Phompha
 * @Create Date -
 */

function select_tab2() {
    /*  wizzard_tab  */
    $("#wizzard_tab2").addClass("nav-item-wizard-aos");
    $("#wizzard_tab1, #wizzard_tab3").removeClass("nav-item-wizard-aos");

    /*  wizzard_icon  */
    $("#tab_icon_2").addClass("border-wizard-aos");
    $("#tab_icon_2").removeClass("border-wizard2-aos");

    $("#tab_icon_1, #tab_icon_3").addClass("border-wizard2-aos");
    $("#tab_icon_1, #tab_icon_3").removeClass("border-wizard-aos");


    /*  wizzard_tab_font  */
    $("#tab_font_2").addClass("tab_active_font");
    $("#tab_font_1, #tab_font_3").removeClass("tab_active_font");

    /*  wizzard_body  */
    $("#wizard_body_expense").addClass("active");
    $("#wizard_body_income, #wizard_body_future_payment").removeClass("active");

    /*  wizzard_button  */
    $(".tab1_button").hide();
    $(".tab2_button").show();
    $(".tab3_button").hide();
} //select_tab2

/*
 * select_tab3
 * เลือก tab 3
 * @input -
 * @output -
 * @author 61160079 Adithep Phompha
 * @Create Date -
 */

function select_tab3() {
    /*  wizzard_tab  */
    $("#wizzard_tab3").addClass("nav-item-wizard-aos");
    $("#wizzard_tab1, #wizzard_tab2").removeClass("nav-item-wizard-aos");

    /*  wizzard_icon  */
    $("#tab_icon_3").addClass("border-wizard-aos");
    $("#tab_icon_3").removeClass("border-wizard2-aos");

    $("#tab_icon_1, #tab_icon_2").addClass("border-wizard2-aos");
    $("#tab_icon_1, #tab_icon_2").removeClass("border-wizard-aos");


    /*  wizzard_tab_font  */
    $("#tab_font_3").addClass("tab_active_font");
    $("#tab_font_1, #tab_font_2").removeClass("tab_active_font");

    /*  wizzard_body  */
    $("#wizard_body_future_payment").addClass("active");
    $("#wizard_body_income, #wizard_body_expense").removeClass("active");

    /*  wizzard_button  */
    $(".tab1_button").hide();
    $(".tab2_button").hide();
    $(".tab3_button").show();
} //select_tab3
</script>

<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->


<!-- scroll-bar (ปิดการซ่อน scroll-bar) -->

<style>
.scrollar-show {
    overflow-y: auto;
    /* height: 400px; แนะนำว่ากำหนดเองในหน้า view ดีกว่า */
}

.scrollar-show::-webkit-scrollbar {
    -webkit-appearance: none;
}

.scrollar-show::-webkit-scrollbar:vertical {
    width: 11px;
}

.scrollar-show::-webkit-scrollbar:horizontal {
    height: 11px;
}

.scrollar-show::-webkit-scrollbar-thumb {
    border-radius: 8px;
    border: 2px solid white;
    /* should match background, can't be transparent */
    background-color: rgba(0, 0, 0, .5);
}
</style>


<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->

<!-- จัดรูปแบบตัวเลข -->

<script>
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

/*
 * เชค number แล้วใส่ comma
 * @input ตัวเลข
 * @output 100,000.00
 * @author Pongrapee
 * @Create Date 2564-01-29
 * @syntax: class=\"chk_number\"
 */
// $(document).on('keyup', '.chk_number', function() {
//     formatCurrency($(this));
// });

function formatNumbers(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
    // appends $ to value, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") {
        return;
    }

    // original length
    var original_len = input_val.length;

    // initial caret position
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumbers(left_side);

        // validate right side
        right_side = formatNumbers(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
            right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = "" + left_side + "." + right_side;

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumbers(input_val);
        input_val = "" + input_val;

        // final formatting
        if (blur === "blur") {
            input_val += ".00";
        }
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}
</script>

<!--==========================================================================================================-->
<!--==========================================================================================================-->
<!--==========================================================================================================-->

<!-- button -->

<style>
.acr_button {
    width: 44.01px;
    height: 38.18px;
    padding: 5px 10px;
}
</style>

<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->
<!-- ========================================================================================================== -->


<!-- ถ้าข้อความล้นให้ใส่ "..." -->

<style>
.cut-text {
    text-overflow: ellipsis;
    overflow: hidden;
    /* width: 160px;  ต้องกำหนดเองในหน้า view */
    white-space: nowrap;

}
</style>

<!--==========================================================================================================-->
<!--==========================================================================================================-->
<!--==========================================================================================================-->

<script>
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
</script>