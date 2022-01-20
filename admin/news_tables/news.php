<?php
           include "../heder.php";
           if(empty($_SESSION['login']) || $_SESSION['login']!="admin"){
               header('location:../index.php');
          }
        ?>
    <body>
        <?php
           include "../menu.php";
           include "../../config/con1.php";
           
        ?>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card data-tables">
                                <div class="card-body table-striped table-no-bordered table-hover dataTable dtr-inline table-full-width">
                                    <div class="fresh-datatables">
                                        <div class='col-md-12 text-center'>
                                            <div class='col-md-7 mx-auto'>
                                                <form method="post" action=''>
                                                <div class="form-group">
                                                  <label>News</label>
                                                  <select onchange="this.form.submit()" class="form-control select" id="sel-news-status" name='sel-news-status'>
                                                    <?php include "select_news_status.php"; ?>
                                                  </select>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                        <table id="datatables" class="table table-striped table-no-bordered table-hover news" cellspacing="0" width="100%" style="width:100%" data-tblname='news'>
                                            <thead>
                                                <tr>
                                                     <th>#</th>
                                                     <th class='th' data-name='title'>Title</th>
                                                     <th class='th' data-name='discription'>Discription</th>
                                                     <th class='th' data-name='sport_type'>Sport</th>
                                                     <th class='th' data-name='producer'>Producer</th>
                                                     <th class='th' data-name='news_type'>News type</th>
                                                     <th class='th' data-name='important'>Important</th>
                                                     <th class='th' data-name='created_date'>Created date</th>
                                                     <th class='th' data-name='published_date'>Published date</th>
                                                     <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                     <th>#</th>
                                                     <th >Title</th>
                                                     <th >Discription</th>
                                                     <th >Sport</th>
                                                     <th >Producer</th>
                                                     <th >News type</th>
                                                     <th >Important</th>
                                                     <th >Created date</th>
                                                     <th >Published date</th>
                                                     <th >Action</th>
                                                </tr>
                                                </tr>
                                            </tfoot>
                                            <!--  -->
                                            <tbody id="tbody">
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <?php 
                                    include "../footer.php";
                                    ?>
    <script src="../my_js/news_actions.js"></script>
    <script src="../my_js/post_data_table.js"></script>
</body>
</html>