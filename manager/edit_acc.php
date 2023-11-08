<?php
session_start();
include '../assets/connect/connect.php';
$id = $_SESSION['manager_id'];

?>
<?php
if (!isset($_SESSION['manager_id'])) {
    header('location:../');
    exit();
}
?>

<?php

if (isset($_REQUEST['employee_id'])) {
    $employee_id = $_REQUEST['employee_id'];

    // Truy vấn thông tin của nhân viên dựa trên ID
    $query = mysqli_query($conn, "SELECT * FROM `employee` WHERE `employee_id` = '$employee_id'");
    $employee = mysqli_fetch_assoc($query);

    if (isset($_POST['submit'])) {
        // Kiểm tra không để trống và xử lý thông tin gửi từ biểu mẫu
        $number = isset($_POST['number']) ? mysqli_real_escape_string($conn, $_POST['number']) : '';
        $uname = isset($_POST['uname']) ? mysqli_real_escape_string($conn, $_POST['uname']) : '';
        $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

        $birthdate = isset($_POST['birthdate']) ? mysqli_real_escape_string($conn, $_POST['birthdate']) : '';
        $roles = isset($_POST['roles']) ? mysqli_real_escape_string($conn, $_POST['roles']) : '';

        // Kiểm tra không để trống
        if (empty($number) || empty($uname) || empty($password) || empty($birthdate) || empty($roles)) {
            echo '<script>alert("Vui lòng điền đầy đủ thông tin.");</script>';
        } else {
            // Thực hiện câu truy vấn cập nhật thông tin
            $hash_pass = password_hash($password, PASSWORD_ARGON2I);
            $update_query = mysqli_query($conn, "UPDATE `employee` SET `number`='$number', `email`='$uname', `password`='$hash_pass', `birthdate`='$birthdate', `roles`='$roles' WHERE `employee_id`='$employee_id'");

            if ($update_query) {
                echo '<script>alert("Cập nhật thông tin thành công");
                window.location.href = "list_acc.php";
                </script>';
            } else {
                echo '<script>alert("Cập nhật thông tin không thành công");</script>';
            }
        }
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
    <!-- <link rel="stylesheet" href="../assets/css/login.css"> -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    
</head>
<style>
    /* CSS cho form Create Account */
    .form {
        width: 1200px;
    }

    .page-wrapper .container-fluid .card {
        background-color: #fff;
        padding: 20px;
    }

    .page-wrapper .container-fluid .card form {
        max-width: 400px;
        margin: 0 auto;
    }

    .page-wrapper .container-fluid .card form p {
        color: #26c6da;
        font-size: 24px;
        text-align: center;
    }

    .page-wrapper .container-fluid .card form label {
        color: #26c6da;
        display: block;
        margin-bottom: 6px;
    }

    .page-wrapper .container-fluid .card form .field {
        position: relative;
        margin-bottom: 20px;
    }

    .page-wrapper .container-fluid .card form select,
    .page-wrapper .container-fluid .card form .input-field {
        width: 100%;
        padding: 12px;
        border: 2px solid #26c6da;
        border-radius: 25px;
        margin-top: 6px;
    }

    .page-wrapper .container-fluid .card form .error {
        color: red;
    }

    .page-wrapper .container-fluid .card form .button1 {
        text-align: center;
        margin-top: 20px;
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

    .page-wrapper .container-fluid .card form .submit:hover {
        background-color: #0a7c8a;
    }
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
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
                                    <li class="breadcrumb-item active" aria-current="page">List Account</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
              
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form class="form" method="POST">
                                <p id="heading">UPDATE INFORMATION</p>
                                <!-- Hiển thị thông tin nhân viên và cho phép chỉnh sửa -->
                                <label for="fname">First Name</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="First Name" id="fname" name="fname"
                                        class="input-field" type="text" value="<?php echo $employee['first_name']; ?>"
                                        disabled>
                                </div>
                                <label for="lname">Last Name</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Last Name" id="lname" name="lname"
                                        class="input-field" type="text" value="<?php echo $employee['last_name']; ?>"
                                        disabled>
                                </div>
                                <label for="number">Number</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Number" id="number" name="number"
                                        class="input-field" type="text" value="<?php echo $employee['number']; ?>">
                                </div>
                                <label for="uname">Username</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Username" id="uname" name="uname"
                                        class="input-field" type="text" value="<?php echo $employee['email']; ?>">
                                </div>
                                <label for="password">Password</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Password" id="password" name="password"
                                        class="input-field" type="password"
                                        value="<?php echo $employee['password']; ?>">
                                </div>
                                <label for="birthdate">Date of Birth</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Date of Birth" id="birthdate"
                                        name="birthdate" class="input-field" type="date"
                                        value="<?php echo $employee['birthdate']; ?>">
                                </div>
                                <label for="roles">Roles</label>
                                <div class="field">
                                    <select name="roles" id="roles">
                                        <option value="NV" <?php if ($employee['roles'] === 'NV')
                                            echo 'selected'; ?>>Nhân
                                            Viên</option>
                                        <option value="QL" <?php if ($employee['roles'] === 'QL')
                                            echo 'selected'; ?>>Quản
                                            Lý</option>
                                        <option value="SALE" <?php if ($employee['roles'] === 'SALE')
                                            echo 'selected'; ?>>Nhân viên bán hàng</option>
                                    </select>
                                </div>
                                <div class="button1">
                                    <input value="Update" class="submit button1" name="submit" type="submit">
                                </div>
                            </form>
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