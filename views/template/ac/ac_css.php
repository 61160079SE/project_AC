<!-- Plugin -->

<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugin/DataTables/datatables.min.css" />

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

<style>
/* Table */

.table-border>thead>tr>th,
.table-border>tbody>tr>th,
.table-border>thead>tr>td,
.table-border>tbody>tr>td,
.table-border>tfoot>tr>td {
      padding: 12px 8px;
      vertical-align: middle;
      border: 1px solid #ddd;
}



.table thead tr th {
      font-size: 20px;
      text-align: center;
      font-weight: 500;
      color: #FFF;
      background-color: #00bcd4;
      border: 1px solid #eeeeee;
}



.table {
      background-color: #ffffff;
}

.dataTable>thead>tr>th,
.dataTable>tbody>tr>th,
.dataTable>tfoot>tr>th,
.dataTable>thead>tr>td,
.dataTable>tbody>tr>td,
.dataTable>tfoot>tr>td {
      padding: 10px 8px !important;
}

table.dataTable {
      border-collapse: collapse !important;
      font-size: 18px;
}



div.dataTables_wrapper div.dataTables_paginate {
      margin-top: 11px;
}
</style>