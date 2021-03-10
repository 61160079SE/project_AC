<?php
/*
 * v_logon
 * หน้าจอเข้าสู่ระบบ
 * @author 61160082 Areerat Pongurai
 * @Create Date 2564-03-04
 */
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


<body class="login-page sidebar-collapse">

    <div class="page-header header-filter" style="background-image: url('<?php echo base_url(); ?>assets/template/Material-kit-master/assets//img/bg7.jpg'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto">
                    <div class="card card-login">
                        <div class="card-header card-header-primary">
                            <h2 class="card-title" style="text-align:center">เข้าสู่ระบบ</h2>
                            <h3 class="card-category" style="text-align:center">ระบบบัญชีรายรับ - รายจ่าย</h3>
                        </div>
                        <div class="card-body">
                            <!-- <form method="POST" action="index.php"> -->
                            <div class="row">
                                <div class="col-md-8 ml-auto mr-auto">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="username">ชื่อผู้ใช้งาน </label>
                                        <input style="font-size:18px" type="text" class="form-control" name="username" id="username">
                                    </div>
                                </div>
                                <div class="col-md-8 ml-auto mr-auto">
                                    <div class="form-group">
                                        <label class="bmd-label-floating" for="password">รหัสผ่าน </label>
                                        <input style="font-size:18px" type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">

                                    </div> -->
                                <br> <br> <br> <br><br>
                                <div class=" col-md-7 ml-auto mr-auto">
                                    <div class="form-group">
                                        <input style="font-size:16px" type="button" id="btn_login" onclick="check_login()" class="btn btn-primary col-md-12" value="เข้าสู่ระบบ">
                                    </div>
                                </div>

                                <div class="col-md-12" style="text-align:center">
                                    <div class="form-group">
                                        <a style="font-size:16px" class="text-muted" href="<?php echo site_url() . "/" . $this->config->item('ac_register') ?>show_register"> ไม่เคยลงทะเบียน </a>
                                    </div>
                                </div>

                            </div>

                            <!-- </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>




<script>
function check_login() {
    var username = $("#username").val();
    var password = $("#password").val()

    $.ajax({
        type: "POST",
        url: "<?php echo site_url() . "/" . $this->config->item('ac_login') ?>check_login_ajax",
        data: {
            'us_name': username,
            'us_pass': password
        },
        dataType: "JSON",
        success: function(response) {
            console.log("response " + response);
            if (response == 1) {
                Swal.fire(
                    'เข้าสู่ระบบสำเร็จ',
                    '',
                    'success'
                ).then((result) => {
                    window.location.href = "<?php echo site_url() . "/" . $this->config->item('ac_controller') ?>show_homepage";
                })
                // window.location = "<?php //echo site_url() . "/" ?>ac/user/Register/show_register";
            } //if
            else {
                Swal.fire(
                    'เข้าสู่ระบบไม่สำเร็จ',
                    'ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง',
                    'error'
                )
            } //else
        }
    }); //ajax
} //check_login
</script>