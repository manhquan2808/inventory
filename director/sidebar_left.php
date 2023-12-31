<style>
    .sidebar-link.waves-effect.waves-dark.sidebar-link{
        border-radius: 50px;
    }
    .sidebar-item ul {
        display: none;
        padding-left: 20px;
    }

    .sidebar-item:hover ul {
        display: block;
    }
</style>

<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->


                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi me-2 mdi-material-ui"></i><span
                            class="hide-menu">Nguyên Vật Liệu</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="arrange_resource.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i><span class="hide-menu">Điều phối</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="inventory_list.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i><span class="hide-menu">Danh sách kho</span></a>
                        </li>
                        
                    </ul>
                </li>

                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi me-2 mdi-material-ui"></i><span
                            class="hide-menu">Duyệt Đơn</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="arrange_resource.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i><span class="hide-menu">Nhập Nguyên Vật Liệu</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="list_resource.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i> <span class="hide-menu">Xuất Nguyên Vật Liệu</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="add_resource.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i> <span class="hide-menu">Nhập Thành Phẩm</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="add_resource.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i> <span class="hide-menu">Xuất Thành Phẩm</span></a>
                        </li>
                    </ul>
                </li> -->
                <!-- Kiểm kê cho 1 roles mới -->
                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="#" aria-expanded="false"><i class="mdi me-2 mdi-book-open-variant"></i><span
                            class="hide-menu">Inventory Check</span></a>
                </li> -->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="issue_resource.php"
                        aria-expanded="false"><i class="mdi me-2 mdi-file-document-box"></i><span
                            class="hide-menu">Quản Lý Phiếu</span></a>
                </li>
                        
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="#" aria-expanded="false"><i class="mdi me-2 mdi-clipboard-account"></i><span
                            class="hide-menu">Tài Khoản</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="add_acc.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i><span class="hide-menu">Thêm Tài Khoản</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="list_acc.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i> <span class="hide-menu">Danh Sách Tài Khoản</span></a>
                        </li>
                    </ul>

                </li>
                

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="pages-profile.php" aria-expanded="false">
                        <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Trang Cá Nhân</span></a>
                </li>


            </ul>

        </nav>
        <!-- End Sidebar navigation -->

    </div>
    <!-- End Sidebar scroll-->
    <div class="sidebar-footer">
        <div class="row">
            <div class="col-4 link-wrap">
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i
                        class="ti-settings"></i></a>
            </div>
            <div class="col-4 link-wrap">
                <!-- item-->
                <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                        class="mdi mdi-gmail"></i></a>
            </div>
            <div class="col-4 link-wrap">
                <!-- item-->
                <a href="../logout.php?id=<?php echo $id; ?>" class="link" data-toggle="tooltip" title=""
                    data-original-title="Logout"><i class="mdi mdi-power"></i></a>

            </div>
        </div>
    </div>
</aside>