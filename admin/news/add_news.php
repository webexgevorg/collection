<?php
include "../../config/con1.php";
include "../heder.php";
?>
    <body>
    <?php
    include "../menu.php";
    ?>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 add-bs" style="margin: 0 auto">
                    <button class="p-3 card stacked-form">
                        <button class="btn btn-primary">Add News</button>
                        <div class="card-header ">
                            <h4 class="card-title">Add News</h4>


                        </div>
                        <form>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" placeholder="name@example.com">
                            </div>
                            <div class="form-group">
                                <label for="discription">Discription</label>
                                <textarea class="form-control" id="discription" rows="40" cols="40"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="sporttype">Sports type</label>
                                <select  class="form-control" id="sporttype">
                                    <?php

                                    $sql_news="SELECT*FROM sports_type";
                                    $query_news=mysqli_query($con,$sql_news);
                                    while($row=mysqli_fetch_assoc($query_news)){
                                        echo "<option>".$row['sport_type']."</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="producer">Producer</label>
                                <select  class="form-control" id="producer">
                                    <option>UpperDeck</option>
                                    <option>Panini</option>
                                    <option>Topps</option>
                                    <option>Leaf</option>
                                    <option>SeReal</option>
                                    <option>Other</option>
                                    <option>All</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="newstype">News type</label>
                                <select  class="form-control" id="newstype">
                                    <option>Portal news</option>
                                    <option>Producer news</option>
                                    <option>Releases news</option>
                                    <option>Sports news</option>
                                    <option>All</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="published">Published data</label>
                                <input type="date" id="published">
                            </div>

                        </form>
                        <button   class="btn btn-primary  addNews p-2" type="submit"  style="width:120px">Add news</button>
                        <p  class="m-5 text-center" id="rezult"></p>
                    </div>



                </div>
            </div>
            <div class="row">
                <div class="container">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Discription</th>
                        <th scope="col">Sport</th>
                        <th scope="col">Producer</th>
                        <th scope="col">News type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created date</th>
                        <th scope="col">Published date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "../footer.php";
    ?>
<!--    <script src="../js/add_news.js"></script>-->
<script>
    $('.addNews').on('click',function(){
        let title = $('#title').val()
        let discription = $('#discription').val()
        let sporttype = $('#sporttype').val()
        let producer = $('#producer').val()
        let newstype =$('#newstype').val()
        let published=$('#published').val()
        if( $('#title').val() ==''|| $('#discription').val() ==''){
            $('#rezult').html("<p style='color:red'>Fill all the fields</p>")
            // alert()
        }else {

            $.ajax({
                type: 'POST',
                url: 'add_news_check.php',
                data: {
                    title: title,
                    discription: discription,
                    sporttype: sporttype,
                    producer: producer,
                    newstype: newstype,
                    published: published
                },
                success: function (rezult) {
                    $('#rezult').html("<p style='color: rgb(19,57,96);font-size:20px;font-weight:bold'>"+rezult+"</p>")
                }
            })
        }
    })

</script>

    </body>
    </html>
