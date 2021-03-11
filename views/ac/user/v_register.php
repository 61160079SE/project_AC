<?php
/*
 * v_register
 * หน้าจอลงทะเบียน
 * @author 61160082 Areerat Pongurai
 * @Create Date 2564-03-04
 */
session_start();
if (isset($_SESSION['us_id'])) {
    $view_path = site_url() . "/" . $this->config->item('ac_controller') . "show_homepage";
    header("Location: " . $view_path);
} //if
?>

<body class="login-page sidebar-collapse">
    <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
        <div class="container">


        </div>
    </nav>
    <div class="page-header header-filter" style="background-image: url('<?php echo base_url(); ?>assets/template/Material-kit-master/assets//img/bg7.jpg'); background-size: cover; background-position: top center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">
                        <form class="form" method="" action="">
                            <div class="card-header card-header-primary text-center">
                                <h4 class="card-title">Login</h4>
                            </div>

                            <div class="card-body">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">face</i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" id="username" placeholder="UserName...">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">mail</i>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control" id="email" placeholder="Email...">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control" id="password" placeholder="Password...">
                                </div>
                            </div>
                            <div class="footer text-center">
                                <a href="#pablo" onclick="insert_user()" class="btn btn-primary btn-link btn-wd btn-lg">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">

        </footer>
    </div>
</body>

<script>
$('document').ready(function() {

});


function insert_user() {
    $.ajax({
        type: "post",
        url: "<?php echo site_url() . "/" . $this->config->item('ac_register') ?>check",
        data: {
            'us_name': $('#username').val(),
            'us_pass': $('#password').val(),
            'us_email': $('#email').val()
        },
        dataType: "JSON",
        success: function(json_data) {
            console.log(json_data);
            if (json_data['insert_status'] == 'fail') {
                alert('ชื่อผู้ใช้งานนี้ ถูกใช้งานไปแล้ว กรุณาตั้งชื่อใหม่');
            } else {

            }
        }
    }); //ajax

}
</script>