<?php
session_start();
include '../assets/connect/connect.php';

$id = $_SESSION['manager_id'];

?>

<?php
if (isset($_POST["submit"])) {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $number = mysqli_real_escape_string($conn, $_POST["number"]);
    $uname = mysqli_real_escape_string($conn, $_POST["uname"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $birthdate = mysqli_real_escape_string($conn, $_POST["birthdate"]);
    $roles = mysqli_real_escape_string($conn, $_POST["roles"]);
    $hash_pass = password_hash($password, PASSWORD_ARGON2I);



    if (empty($fname) || empty($lname) || empty($number) || empty($uname) || empty($password) || empty($birthdate) || empty($roles)) {
        echo '<script>
                alert("Nhập đầy đủ thông tin")
                </script>';

    } else {
        if ($roles === 'NV') {
            $id = 'NV' . rand(10000, 99999);
        } elseif ($roles === 'QL') {
            $id = 'QL' . rand(10000, 99999);
        } elseif ($roles === 'SALE') {
            $id = 'SALE' . rand(10000, 99999);
        } elseif ($roles === 'NVL') {
            $id = 'NVL' . rand(10000, 99999);
        } elseif ($roles === 'CC') {
            $id = 'CC' . rand(10000, 99999);
        }          
        $query = mysqli_query($conn, "INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `number`, `email`, 
        `password`, `birthdate`, `roles`) VALUES ('$id', '$fname', '$lname', '$number', '$uname', '$hash_pass', '$birthdate', '$roles')");
      if ($query) {
            echo '<script>
                    alert("Tạo tài khoản thành công");
                    window.location.href = "../manager";
                    </script>';

        } else {
            echo '<script>
                    alert("Tạo tài khoản không thành công")
                    </script>';
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
/* CSS cho form Create Account */
.form{
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
                        <h3 class="page-title mb-0 p-0">Account</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Account</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Account</li>
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
                    <div class="col-12">
                        <div class="card">
                            <form class="form" method="POST" onsubmit="return check_validate()">
                                <p id="heading">CREATE ACCOUNT</p>
                                <label for="fname">First Name</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="First Name" id="fname" name="fname" class="input-field"
                                        type="text" required>
                                </div>
                                <span id="fnameError" class="error"></span>
                                <label for="lname">Last Name</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Last Name" id="lname" name="lname" class="input-field"
                                        type="text" required>
                                </div>
                                <span id="lnameError" class="error"></span>
                                <label for="number">Number</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Number" id="number" name="number" class="input-field"
                                        type="number" required>
                                </div>
                                <span id="numberError" class="error"></span>
                                <label for="uname">Username</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Username" id="uname" name="uname" class="input-field"
                                        type="email" required>
                                </div>
                                <span id="unameError" class="error"></span>
                                <label for="password">Password</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Password" id="password" name="password" class="input-field"
                                        type="password" required>
                                </div>
                                <span id="passwordError" class="error"></span>
                                <label for="birthdate">Date of Birth</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Date of Birth" id="birthdate" name="birthdate"
                                        class="input-field" type="date" required>
                                </div>
                                <span id="birthdateError" class="error"></span>
                                <label for="roles">Roles</label>
                                <div class="field">
                                    <select name="roles" id="roles" required>
                                        <option value="">Select roles</option>
                                        <option value="NV">Nhân Viên</option>
                                        <option value="QL">Quản Lý</option>
                                        <option value="SALE">Nhân Viên Sale</option>
                                        <option value="NVL">Ban Nguyên Vật Liệu</option>
                                        <option value="CC">Cung Cấp Nguyên Vật Liệu</option>

                                    </select>
                                </div>
                                <span id="rolesError" class="error"></span>
                                <div class="button1">
                                    <input value="Submit" class="submit button1" name="submit" type="submit">
                                </div>
                            </form>
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