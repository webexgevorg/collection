   <div class="wrapper">
        <div class="sidebar" data-color="orange" data-image="../image/hokey1.jpg">
            
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text logo-mini">
                        Ct
                    </a>
                    <a href="" class="simple-text logo-normal">
                        Creative Tim
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="../test/index.php">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                 
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                            <i class="nc-icon nc-notes"></i>
                            <p>
                                Forms
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="formsExamples">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="../base_checklist/add_base_checklist.php">
                                        <span class="sidebar-mini">BCH</span>
                                        <span class="sidebar-normal">Add Base Checklist</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../base_checklist/infographic.php">
                                        <span class="sidebar-mini">IG</span>
                                        <span class="sidebar-normal">Infographic</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../footer/add_footer.php">
                                        <span class="sidebar-mini">AF</span>
                                        <span class="sidebar-normal">Add footer</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../store_rating/add_store_rating.php">
                                        <span class="sidebar-mini">SR</span>
                                        <span class="sidebar-normal">Add Store Rating</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../news/add_news.php">
                                        <span class="sidebar-mini">AN</span>
                                        <span class="sidebar-normal">Add News</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>
                                Tables
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse " id="tablesExamples">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="../base_checklist/base_checklist.php">
                                        <span class="sidebar-mini">BCH</span>
                                        <span class="sidebar-normal">Base Checklist</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../base_checklist/sport_type.php">
                                        <span class="sidebar-mini">ST</span>
                                        <span class="sidebar-normal">Sport Type</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="../banner/banner.php">
                                        <span class="sidebar-mini">B</span>
                                        <span class="sidebar-normal">Banner</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link"  href="../store_rating/changeStoreRating.php">
                                        <span class="sidebar-mini">CS</span>
                                        <span class="sidebar-normal">Change Store</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?out">
                            <i class="nc-icon nc-button-power"></i>
                            <p>
                               Log Out
                                
                            </p>
                        </a>
                       
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-minimize">
                            <button id="minimizeSidebar" class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                                <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo"> Dashboard PRO </a>
                    </div>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
           
                </div>
            </nav>
            <?php
            if(isset($_GET['out'])){
                unset($_SESSION['login']);
                ?>
                <script> 
                location.href="../index.php"
               </script>
                <?php
            }
            
            
            ?>