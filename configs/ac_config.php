<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

//folder asset
$config["ac_asset"] = "assets/img/ac/"; //folder asset

//folder หลักของ model
$config["ac_m_folder"] = "ac/";

//folder หลักของ view
$config["ac_v_folder"] = "ac/";

//folder หลักของ controller
$config["ac_c_folder"] = "ac/";

//folder ย่อยของ view
$config["ac_v_base_folder"] = $config["ac_v_folder"] . "base/"; //folder base
$config["ac_v_report_folder"] = $config["ac_v_folder"] . "report/"; //folder report
$config["ac_v_accounting_folder"] = $config["ac_v_folder"] . "accounting_management/"; //folder accounting_management

//folder หลักของ controller
$config["ac_c_folder"] = "ac/";

//folder ย่อยของ controller
$config["ac_c_base_folder"] = $config["ac_c_folder"] . "base/"; //folder base
$config["ac_c_report_folder"] = $config["ac_c_folder"] . "report/"; //folder report
$config["ac_c_accounting_folder"] = $config["ac_c_folder"] . "accounting_management/"; //folder accounting_management

/* ================ ไฟล์  ================ */

//ไฟล์ controller ใน folder หลัก
$config["ac_controller"] = $config["ac_c_folder"] . "AC_Controller/"; //ไฟล์ ac_controller

//ไฟล์ controller ใน folder base
$config["ac_money_main"] = $config["ac_c_base_folder"] . "Money_category_main/"; //ไฟล์ Money_category_main

//ไฟล์ controller ใน folder report
$config["ac_budget_year_dashboard"] = $config["ac_c_report_folder"] . "Budget_year_dashboard/"; //ไฟล์ Budget_year_dashboard
$config["ac_year_summary"] = $config["ac_c_report_folder"] . "Year_summary/"; //ไฟล์ Year_summary
$config["ac_month_summary"] = $config["ac_c_report_folder"] . "Month_summary/"; //ไฟล์ Month_summary
$config["ac_daily_summary"] = $config["ac_c_report_folder"] . "Daily_summary/"; //ไฟล์ Daily_summary
$config["ac_daily_detail"] = $config["ac_c_report_folder"] . "Daily_detail/"; //ไฟล์ Daily_detail

//ไฟล์ controller ใน folder accounting_data_management
$config["ac_budget_year_management"] = $config["ac_c_accounting_folder"] . "Budget_year_management/"; //ไฟล์ Budget_year_management

//ไฟล์ controller ใน folder user
$config["ac_login"] = $config["ac_c_user_folder"] . "Login/"; //ไฟล์ Login
$config["ac_logout"] = $config["ac_c_user_folder"] . "Logout/"; //ไฟล์ Logout
$config["ac_register"] = $config["ac_c_user_folder"] . "Register/"; //ไฟล์ Register