<?php
session_start();
include '../assets/connect/connect.php';

if (!isset($_SESSION['manager_id'])) {
    header('location:../');
    exit();
}
$id = $_SESSION['manager_id'];
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Material Pro Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- <link rel="stylesheet" href="../assets/css/login.css"> -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">

</head>
<style>

</style>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php
        include './header.php';
        include './sidebar_left.php';
        ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Account</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form method="POST">
                                        <!-- <h4 class="card-title">Basic Table</h4> -->
                                        <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->

                                        <?php
                                        if (isset($_REQUEST['remove_employee_id'])) {
                                            $remove = $_REQUEST['remove_employee_id'];
                                            mysqli_query($conn, "DELETE FROM `resource` WHERE `resource`.`resource_id` = '$remove'");
                                        }
                                        $result = mysqli_query($conn, "SELECT `resource`.`resource_name`  FROM `resource`
                                                                join `issue_resources` ON `issue_resources`.`resource_id` = `resource`.`resource_id`
                                                                join `issue` ON `issue`.`issue_id` = `issue_resources`.`issue_id`  
                                                                join `inventory` ON `inventory`.`inventory_id` = `issue`.`inventory_id`
                                                                where `resource`.`status` like 'Distributed'");
                                        ?>
                                        <table class="table user-table">
                                            <thead>
                                                <tr>
                                                    <th class="border-top-0">checkbox</th>
                                                    <th class="border-top-0">Resource Name</th>
                                                    <th class="border-top-0">Quantiy</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0" colspan="2">Update</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <tr class="action">
                                                        <td>
                                                            <?php echo $count++ ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['full_name']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['number']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['email']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['birthdate']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['roles']; ?>
                                                        </td>
                                                        <td style="width: 13%; text-align: center;">
                                                            <a
                                                                href="./edit_acc.php?employee_id=<?php echo $row['employee_id'] ?>&director_id=<?php echo $_SESSION['director_id'] ?>">
                                                                Cập Nhật
                                                            </a>
                                                        </td>
                                                        <td style="width: 5%; text-align: center;">
                                                            <a href="?remove_employee_id=<?php echo $row['employee_id']; ?>"
                                                                onclick="return confirm('Are You Sure?')">
                                                                Xóa
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
            </footer>

        </div>

    </div>
    <script src="../assets/plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>