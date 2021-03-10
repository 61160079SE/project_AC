<title> ระบบบัญชีรายรับ - รายจ่าย </title>
<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-translate">
            <div class="row">
                <span class="material-icons">library_books</span> &emsp; <span style="font-weight:1000; font-size:20px; color:white; ">ระบบบัญชีรายรับ - รายจ่าย </span>
            </div>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">

                <li class="dropdown nav-item">
                    <a href="javascript:;" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <i class="material-icons">account_circle</i> <?php echo $this->session->userdata("us_name"); ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:logout();" class="dropdown-item">ออกจากระบบ</a>
                        <!-- <a href="<?php //echo remove_session(); ?>" class="dropdown-item">ออกจารระบบ</a> -->
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>