<?php
require_once("core/init.php");
$page = getFrom('page');
$action = getFrom('type');

if(isset($_GET['page'], $_GET['type']) && $page == "metode" && $action != ""){
    $selected_method = " | ". ucfirst($page) . " " . ucwords(str_replace("-", " ", $action));
} else {
    $selected_method = "";
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Metode Numerik<?= $selected_method; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url("assets/vendor/fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/vendor/select2/select2.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/vendor/select2/select2-bootstrap4.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.standalone.min.css") ?>">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url("assets/css/sb-admin-2.min.css") ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once("templates/sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="margin-left: 14rem;">

            <!-- Main Content -->
            <div id="content">

                <?php require_once("templates/navbar.php") ?>

                <?php
                    if($page == ""):
                        require_once("content/main-page.php");

                    # Agent
                    elseif ($page == "metode"):
                        if($action == ""):
                            call_content("agent","index");
                        else:
                            call_content("metode", $action);
                        endif;
                    elseif ($page == "differensiasi"):
                        if($action == ""):
                            require_once("content/differensiasi.php");
                        else:
                            require_once("content/differensiasi.php");
                        endif;
                    else:
                        require_once("content/404.php");
                    endif;

                ?>

            </div>
            <!-- End of Main Content -->

            <?php require_once("templates/footer.php"); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url("assets/vendor/jquery-easing/jquery.easing.min.js") ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url("assets/js/sb-admin-2.min.js") ?>"></script>

    <script>
        $(document).ready(function() {
            $("input[type=text]").attr('autocomplete', 'off');
        });
    </script>
</body>

</html>
