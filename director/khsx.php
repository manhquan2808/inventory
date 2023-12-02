<?php
session_start();
include("../assets/connect/connect.php");

$id = $_SESSION['director_id'];
?>
<?php
if (!isset($_SESSION['director_id'])) {
    header('location:../');
    exit();
}
?>
<?php
include("../assets/class/khsx.php");
$p= new khsx();
 
if(isset($_REQUEST['layid']))
{
	$layid=$_REQUEST['layid'];
	
}
if (isset($_REQUEST['layid'])) {
    $layid = $_REQUEST['layid'];

    // Kiểm tra xem $layid có giá trị hay không
    if (!empty($layid)) {
        // Lấy giá trị từ cơ sở dữ liệu và hiển thị trong các trường input
        $idkhsx = $p->chon_cot("select ID_KHSX from kehoachsanxuat where ID_KHSX='$layid' limit 1");
        $startdate = $p->chon_cot("select NgayBatDau from kehoachsanxuat where ID_KHSX='$layid' limit 1");
        $enddate = $p->chon_cot("select NgayKetThuc from kehoachsanxuat where ID_KHSX='$layid' limit 1");
        $trangthai = $p->chon_cot("select TrangThai from kehoachsanxuat where ID_KHSX='$layid' limit 1");
        $IDPheDuyet = $p->chon_cot("select ID_BGD_PheDuyet from kehoachsanxuat where ID_KHSX='$layid' limit 1");
    } else {
        // Đặt giá trị mặc định hoặc để trống
        $idkhsx = '';
        $startdate = '';
        $enddate = '';
        $trangthai = '';
        $IDPheDuyet = '';
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
    
</head>
<style>
    td a{
        color: #0a7c8a;
    }
    td a:hover{
        color: #26c6da;
    }
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
                                    <li class="breadcrumb-item active" aria-current="page">Production Plan</li>
                                    <li class="breadcrumb-item active" aria-current="page">Add_Production Plan</li>
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
                            <form class="form" action="" method="post" >
                            
                                <input type="hidden" name="idcanxoa" id="idcanxoa"  value="<?php echo $layid;?>" width="500px">
                                <p id="heading">CREATE Production Plan</p>
                                <label for="idkhsx">ID Kế hoạch sản xuất</label>
                                <div class="field">
                                    <input autocomplete="off"  id="idkhsx" name="idkhsx"
                                    class="input-field" type="text" required value="<?php echo isset($idkhsx) ? $idkhsx : '';?>">
                                </div>
                                <span id="idkhsxError" class="error"></span>
                                <label for="startdate">Ngày bắt đầu</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="Ngày bắt đầu" id="startdate" name="startdate"
                                        class="input-field" type="date" required value="<?php echo isset($startdate) ? $startdate : '';  ?>">
                                </div>
                                <span id="startdateError" class="error"></span>
                                <label for="enddate">Ngày kết thúc</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="ngày kết thúc" id="enddate" name="enddate"
                                        class="input-field" type="date" required value="<?php echo isset($enddate) ? $enddate : '';
                                          
                                        ?>">
                                </div>
                                <span id="enddateError" class="error"></span>
                                <label for="trangthai">Trạng thái</label>
                                <div class="field">
                                    <select name="trangthai" id="trangthai" class="input-field">
                                      
                                        <option value="đang lên kế hoạch" <?php echo isset($trangthai) ? $trangthai : ''; ?>>đang lên kế hoạch</option>
                                        <option value="đang thực hiện" <?php  echo isset($trangthai) ? $trangthai : '';  ?>>đang thực hiện</option>
                                        <option value="đã hoàn thành" <?php  echo isset($trangthai) ? $trangthai : '';  ?>>đã hoàn thành</option>
                                    </select>
                                </div>
                                <span id="trangthaiError" class="error"></span>
                                <label for="IDPheDuyet">ID BGD phê duyệt</label>
                                <div class="field">
                                    <input autocomplete="off" placeholder="id phê duyệt" id="IDPheDuyet" name="IDPheDuyet"
                                        class="input-field" type="text"  value="<?php  echo isset($IDPheDuyet) ? $IDPheDuyet : ''; ?>" required>
                                </div>
                             
                                <span id="IDPheDuyetError" class="error"></span>
                                <div class="button1">
                                    <input class="submit" type="submit" name="nut" id="nut" value="Thêm kế hoạch sản xuất" style="margin: 20px;">
                                    <input class="submit" type="submit" name="nut" id="nut" value="Sửa kế hoạch sản xuất" style="margin: 20px;">
                                    <input class="submit" type="submit" name="nut" id="nut" value="Xóa kế hoạch sản xuất" style="margin: 20px;">
                                </div>
                                
                                
                      
                            </form>
                        </div>
                    </div>
                    <div class="col-12">
                    <div class="col-12">
                                    <?php
				                    $p->xuatdsKHSX("select * from kehoachsanxuat order by ID_KHSX desc");
			                    ?> 
                                </div>
                              
                    </div>
                </div>

                <?php 
    
                switch($_POST['nut'])
                {
                    case 'Thêm kế hoạch sản xuất':
                    {
                        $idkhsx = $_REQUEST["idkhsx"];
                        $startdate = $_REQUEST["startdate"];
                        $enddate = $_REQUEST["enddate"];
                        $trangthai = $_REQUEST["trangthai"];
                        $IDPheDuyet = $_REQUEST["IDPheDuyet"];
                        if (empty($idkhsx) || empty($startdate) || empty($enddate) || empty($trangthai) || empty($IDPheDuyet) ) {
                            echo '<script>
                                    alert("Nhập đầy đủ thông tin")
                                    </script>';
                    
                        } else {
                           
                                    if (strtotime($enddate) <= strtotime($startdate . ' +15 days')) {
                                        echo '<script>
                                        alert("Ngày kết thúc phải sau ít nhất 15 ngày so với ngày bắt đầu.")
                                        </script>';
                                
                                    } else {
                                
                                        if ($p->themsuaxoa("INSERT INTO kehoachsanxuat(ID_KHSX,NgayBatDau,NgayKetThuc,TrangThai,ID_BGD_PheDuyet)
                                        VALUES ('$idkhsx', '$startdate', '$enddate', '$trangthai', '$IDPheDuyet')")==1) {
                                            echo '<script>
                                                    alert("Tạo kế hoạch thành công");
                                                    window.location.href = "khsx.php";
                                                    </script>';
                                
                                        } else {
                                            echo '<script>
                                                    alert("Tạo tạo kế hoạch thành công")
                                                    </script>';
                                        }    
                                    }
                        }
                     
                        break;	
                    }
                    case'Sửa kế hoạch sản xuất':
                    {
                        $layidsua=$_REQUEST['idcanxoa'];
                        $startdate = $_REQUEST["startdate"];
                        $enddate = $_REQUEST["enddate"];
                        $trangthai = $_REQUEST["trangthai"];
                        $IDPheDuyet = $_REQUEST["IDPheDuyet"];
                        if($layidsua>0)
                        {   
                            if($p->themsuaxoa("UPDATE kehoachsanxuat SET NgayBatDau = '$startdate', NgayKetThuc = '$enddate',TrangThai='$trangthai', ID_BGD_PheDuyet = '$IDPheDuyet' where  ID_KHSX ='$layidsua' LIMIT 1")==1)
                            {
                                        echo '<script language="javascript">
                                                alert("sửa thành công.");
                                                </script>';
                                                echo '<script language="javascript">
                                                        window.location="khsx.php";
                                                </script>';
                                    }else
                                    {
                                        echo '<script language="javascript">
                                                alert("sửa không thành công.");
                                                </script>';	
                                    }
                                
                        
                        }else
                        {
                            echo '<script language="javascript">
                            alert("vui lòng chọn kế hoạch cần sửa.");
                            </script>';
                                
                        }
                        break;	
                    }
                    case'Xóa kế hoạch sản xuất':
                    {	
                        $layidxoa=$_REQUEST['idcanxoa'];
                        if($layidxoa>0)
                        {
                                
                               
                                    if($p->themsuaxoa("delete from kehoachsanxuat where ID_KHSX='$layidxoa' limit 1")==1)
                                    {
                                            echo '<script language="javascript">
                                                alert("Xóa thành công.");
                                                </script>';
                                                echo '<script language="javascript">
                                                        window.location="khsx.php";
                                                </script>';
                                    }else
                                    {
                                        echo 
                                        '<script language="javascript">
                                                alert("xóa không thành công");
                                                </script>';
                                                echo '<script language="javascript">
                                                        window.location="khsx.php";
                                                </script>';
                                    }
                                    
                                 
                        }else
                        {
                            echo '<script language="javascript">
                            alert("vui lòng chọn kế hoạch cần xóa.");
                            </script>';
                           	
                        }
                        break;
                    }
                    
                }
           
                ?>
            </div>
         
            <footer class="footer"> © 2021 Material Pro Admin by <a href="https://www.wrappixel.com/">wrappixel.com </a>
            </footer>

        </div>

        <!-- End Page wrapper  -->

    </div>
    
    <!-- End Wrapper -->
    
    
    <!-- All Jquery -->
    
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