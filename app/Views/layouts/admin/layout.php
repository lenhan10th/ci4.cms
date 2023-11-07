<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | CI4</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>adminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Plugins dynamic -->
    <?= $this->renderSection('plugins_css') ?>
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>adminLTE/css/adminlte.min.css">
    <!-- Modules dynamic -->
    <?= $this->renderSection('modules_css') ?>
</head>

<body class="hold-transition sidebar-mini<?= isset($body_class) ? $body_class : '' ?>">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url(); ?>adminLTE/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <?= $this->include('layouts/admin/includes/navbar') ?>
        <?= $this->include('layouts/admin/includes/sidebar') ?>
        <div class="content-wrapper">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <?= $this->include('layouts/admin/includes/footer') ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <!-- /.control-sidebar -->

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>adminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo base_url(); ?>adminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>adminLTE/js/adminlte.min.js"></script>
    <!-- Plugins script -->
    <?= $this->renderSection('plugins_script') ?>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>adminLTE/js/demo.js"></script>
    <!-- Modules script -->
    <?= $this->renderSection('modules_script') ?>
</body>

</html>