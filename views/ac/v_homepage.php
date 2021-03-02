<!--  link  -->


<!-- ======================================================================================================================== -->
<!-- ======================================================================================================================== -->
<!-- ======================================================================================================================== -->
<!--  navigator  -->

<!-- ======================================================================================================================== -->
<!-- ======================================================================================================================== -->
<!-- ======================================================================================================================== -->

<div class="col-md-12">

    <!-- tittle -->
    <div class="col-md-12 ml-auto mr-auto">
        <div class="alert alert-success alert-dismissible fade show" style="font-size:30px; text-align:center; padding: 30px 15px;">
            <strong>ยินดีต้อนรับเข้าสู่ </strong> ระบบรายงานผลสรุปทางบัญชี
            <button type="button" class="close" data-dismiss="alert">
                <span>×</span>
            </button>
        </div>
    </div>

    <!-- Card เมนู -->
    <div class="col-md-12 ml-auto mr-auto">
        <div class="row">
            <!-- เมนูสรุปผลทางบัญชี -->
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url() . $this->config->item('ac_asset') ?>icon_large_1.jpg">
                    <div class="card-body" style="text-align: center; padding: 30px 0px;">
                        <a href="<?php echo site_url() . "/" . $this->config->item('ac_year_summary') ?>show_year_summary" class="btn btn-success hvr-bounce-to-top" style="font-size: 22px;">
                            <span class="material-icons" style="font-size: 25px;">
                                add_circle_outline
                            </span>
                            สรุปผลทางบัญชี
                        </a>
                    </div>
                </div>
            </div>
            <!-- เมนูจัดการหมวดเงิน -->
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url() . $this->config->item('ac_asset') ?>icon_large_5.jpg">
                    <div class="card-body" style="text-align: center; padding: 30px 0px;">
                        <a href="<?php echo site_url() . "/" . $this->config->item('ac_money_main') ?>show_money_category_menu" class="btn btn-info hvr-bounce-to-top" style="font-size: 22px;">
                            <span class="material-icons" style="font-size: 25px;">
                                add_circle_outline
                            </span>
                            จัดการหมวดเงิน
                        </a>
                    </div>
                </div>
            </div>
            <!-- เมนูจัดการข้อมูลทางบัญชี -->
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="<?php echo base_url() . $this->config->item('ac_asset') ?>icon_large_3.jpg">
                    <div class="card-body" style="text-align: center; padding: 30px 0px;">
                        <a href="<?php echo site_url() . "/" . $this->config->item('ac_budget_year_management') ?>show_budget_year_management" class="btn btn-primary hvr-bounce-to-top" style="font-size: 22px;">
                            <span class="material-icons" style="font-size: 25px;">
                                add_circle_outline
                            </span>
                            จัดการข้อมูลทางบัญชี
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>