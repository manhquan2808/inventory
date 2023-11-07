<?php
session_start();
include("../assets/connect/connect.php");

$id = $_SESSION['director_id'];
?>
<?php
// if (!isset($_SESSION['resource_supplier_id'])) {
//     header('location:login.php');
//     exit();
// }
?>

<?php

if (isset($_REQUEST['remove_resource_id'])) {
    $remove = $_REQUEST['remove_resource_id'];
    mysqli_query($conn, "UPDATE `resource` set `resource`.`status` = 'Đơn hàng đã bị từ chối' WHERE `resource`.`resource_id` = '$remove'");
    // } elseif (isset($_REQUEST['update_resource_id'])) {
    //     $update = $_REQUEST['update_resource_id'];
    //     mysqli_query($conn, "UPDATE `resource` set `resource`.`status` = 'Đơn hàng đang được giao' WHERE `resource`.`resource_id` = '$update'");
}
$result = mysqli_query($conn, "SELECT * FROM `resource`
                        where `status` like 'Accept'
                        ORDER BY `created_time` desc");

// if (isset($_POST['submit'])) {
//     $check_box = [];

//     while ($row_check = mysqli_fetch_assoc($result)) {

//         // Xử lý submit ở đây
//         if (isset($_POST[$row_check['resource_id']])) {
//             array_push($check_box, $_POST[$row_check['resource_id']]);
//             // $check_box = [$_POST[$row_check['resource_id']]];

//         }
//         // echo var_dump($check_box);
//     }
//     if (isset($_POST['Inventory_name']) && count($check_box) > 0) {
//         foreach ($check_box as $key => $value) {
//             $sql = "UPDATE `resource` SET status='Distributed' WHERE resource_id=$value";
//             $inventory_id = $_POST['Inventory_name'];
//             $sql2 = mysqli_query($conn, "INSERT INTO `issue`(`issue_type`, `status`, `inventory_id`) VALUES ('Nguyên vật liệu','Nhập','$inventory_id')");
//             $issue_id = mysqli_insert_id($conn);
//             while($row = mysqli_fetch_assoc($sql2)){
//                 $issue_id = $row['issue_id'];
//             }
            
//             if (mysqli_query($conn, $sql)) {
//                 $query_insert_issue = mysqli_query($conn, "INSERT INTO `issue`(`issue_type`, `status`, `inventory_id`) VALUES ('Nguyên vật liệu','Nhập','$inventory_id')");
//                 if(mysqli_query($conn, "UPDATE `inventory` set `status` = 'Waiting For Shelves' where `inventory_id` = '$inventory_id'")){
//                 // $issue_id = mysqli_insert_id($conn);
//                 // $resource_id = mysqli_insert_id($conn);
//                 $query_insert_issue_resource = mysqli_query($conn, "INSERT INTO `issue_resources`(`issue_id`, `resource_id`,`status`) VALUES ('$issue_id','$resource_id','Available')")
//                 // $issue_id = mysqli_insert_id($conn);
//                 // $resource_id = mysqli_insert_id($conn);
//                 // $query_insert_ir = mysqli_query($conn, "INSERT INTO `issue_products`(`issue_id`, `product_id`, `shelves_id`, `created_date`, `update_date`, `quantity`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]')");
//             }
//         } echo "<script>alert('Update Successfully!')</script>";
//     }
//     }
// }
if (isset($_POST['submit'])) {
    $check_box = [];

    while ($row_check = mysqli_fetch_assoc($result)) {
        // Xử lý submit ở đây
        if (isset($_POST[$row_check['resource_id']])) {
            array_push($check_box, $_POST[$row_check['resource_id']]);
        }
    }
    
    if (isset($_POST['Inventory_name']) && count($check_box) > 0) {
        $inventory_id = $_POST['Inventory_name'];
        
        // Tạo một issue mới
        $query_insert_issue = mysqli_query($conn, "INSERT INTO `issue`(`issue_type`, `status`, `inventory_id`) VALUES ('Nguyên vật liệu', 'Nhập', '$inventory_id')");
        
        // Lấy issue_id vừa được tạo
        $issue_id = mysqli_insert_id($conn);

        foreach ($check_box as $key => $value) {
            $sql = "UPDATE `resource` SET status='Distributed' WHERE resource_id=$value";
            
            // Cập nhật inventory status
            $update_inventory_status = mysqli_query($conn, "UPDATE `inventory` SET `status` = 'Waiting For Shelves' WHERE `inventory_id` = '$inventory_id'");
            
            if (mysqli_query($conn, $sql) && $update_inventory_status) {
                // Chèn issue_id và resource_id vào bảng issue_resources
                // $query_insert_issue_resource = mysqli_query($conn, "INSERT INTO `issue_resources`(`issue_id`, `resource_id`, `status`) VALUES ('$issue_id', '$value', 'Available')");
            }
        } 
        echo "<script>alert('Update Successfully!')</script>";
    }
}

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
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>q
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
    .slc-ivn {
        text-align: center;
    }

    .page-wrapper .container-fluid .card form select {
        text-align: center;
        width: 30%;
        padding: 12px;
        border: 2px solid #26c6da;
        border-radius: 25px;
        margin-top: 6px;
    }

    .page-wrapper .container-fluid .card form .submit {
        background-color: #26c6da;
        color: #fff;
        padding: 12px 24px;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-size: 16px;
    }

    .page-wrapper .container-fluid .card form .button1 {
        text-align: center;
        margin-top: 20px;
    }
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php
        include './header.php';
        include './sidebar_left.php';
        ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">Resource</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Resource</li>
                                    <li class="breadcrumb-item active" aria-current="page">Distribution Resource</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Basic Table</h4>
                                <h6 class="card-subtitle">Add class <code>.table</code></h6> -->
                                <!-- 
                                <table class="table user-table"> -->
                                <form method="POST">
                                    <!-- <h4 class="card-title">Basic Table</h4> -->
                                    <!-- <h6 class="card-subtitle">Add class <code>.table</code></h6> -->


                                    <table class="table user-table">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th></th>
                                                <th class="border-top-0">Resource Name</th>
                                                <th class="border-top-0">Quantity</th>
                                                <th class="border-top-0">Status</th>
                                                <th class="border-top-0">Time</th>
                                                <!-- <th class="border-top-0" colspan="2">Update</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM `resource` WHERE `status` LIKE 'Accept' ORDER BY `created_time` DESC");
                                            // $data = [];
                                            while ($row = mysqli_fetch_array($result)) {
                                                // $data[] = $row;
                                            

                                                ?>


                                                <tr class="action" style="text-align: center;">
                                                    <td><input type="checkbox" name="<?php echo $row['resource_id'] ?>"
                                                            value="<?php echo $row['resource_id'] ?>">
                                                    </td>
                                                    <td style="text-align: center;">
                                                        <!-- // <th colspan='2'>Update</th> -->
                                                        <?php echo $row['resource_name']; ?>

                                                    </td>
                                                    <td style="text-align: center;">
                                                        <?php echo $row['quantity']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['status']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['created_time']; ?>
                                                    </td>
                                                    <!-- <td style="width: 13%; text-align: center;">
                                                            <a
                                                                href="./edit_acc.php?resource_id=<?php // echo $row['resource_id'] ?>&resource_supplier_id=<?php //echo $_SESSION['resource_supplier_id'] ?>">
                                                                Cập Nhật
                                                            </a>
                                                        </td> -->
                                                    <!-- <td style="width: 5%; text-align: center;">
                                                        <a href="?update_resource_id=<?php //echo $row['resource_id']; ?>"
                                                            onclick="return confirm('Accept?')">
                                                            Chấp nhận
                                                        </a>
                                                    </td> -->
                                                    <!-- <td style="width: 5%; text-align: center;">
                                                        <a href="?remove_resource_id=<?php //echo $row['resource_id']; ?>"
                                                            onclick="return confirm('Reject?')">
                                                            Xóa
                                                        </a> -->
                                                    </td>
                                                </tr>
                                            <?php }
                                            ?>

                                        </tbody>
                                    </table>
                                    <div class="slc-ivn">
                                        <select name="Inventory_name" id="Inventory_name" class="field">
                                            <option value="" hidden>Choose Inventory</option>
                                            <?php
                                            $Inventory_name = array();

                                            $query = "SELECT Inventory_id, Inventory_name FROM `Inventory`";
                                            $result = mysqli_query($conn, $query);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo '<option value="' . $row['Inventory_id'] . '" >' . $row["Inventory_name"] . '</option>';

                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="button1">
                                        <input type="submit" class="submit button1" value="Nhập kho" name="submit"
                                            style="background-color: #26c6da;
                                                        color: #fff;
                                                        padding: 12px 24px;
                                                        border: none;
                                                        border-radius: 25px;
                                                        cursor: pointer;
                                                        font-size: 16px;
                                                    ">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
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