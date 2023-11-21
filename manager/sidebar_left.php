<style>
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


                <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#"
                        aria-expanded="false"><i class="mdi me-2 mdi-material-ui"></i><span
                            class="hide-menu">Resource</span></a>
                    
                </li> -->


                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../manager/inventory_list.php"
                        aria-expanded="false"><i class="mdi me-2 mdi-store"></i><span
                            class="hide-menu">Inventory</span></a></li>

             
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#.php"
                        aria-expanded="false"><i class="mdi me-2 mdi-chart-areaspline"></i><span
                            class="hide-menu">Statistical</span></a>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="#" aria-expanded="false"><i class="mdi me-2 mdi-clipboard-account"></i><span
                            class="hide-menu">Account</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="../manager/add_acc.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i><span class="hide-menu">Add Account</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../manager/list_acc.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i> <span class="hide-menu">List Account</span></a>
                        </li>
                    </ul>

                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="#" aria-expanded="false"><i class="mdi me-2 mdi-reproduction"></i><span
                            class="hide-menu">Product</span></a>
                    <ul>
                        <li class="sidebar-item">
                            <a href="../product_manager/add_product.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i><span class="hide-menu">Add Product</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="../product_manager/list_product.php" class="sidebar-link waves-effect waves-dark sidebar-link"><i
                                    class="mdi me-2 mdi-album"></i> <span class="hide-menu">List Product</span></a>
                        </li>
                    </ul>

                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="icon-material.php" aria-expanded="false"><i class="mdi me-2 mdi-emoticon"></i><span
                            class="hide-menu">Icon</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="pages-profile.php" aria-expanded="false">
                        <i class="mdi me-2 mdi-account-check"></i><span class="hide-menu">Profile</span></a>
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
