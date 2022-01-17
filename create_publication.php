<?php
include "header.php";
include "config/con1.php";
require_once "user-logedin.php";

if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }
   
}

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/checklist.css">
<link rel="stylesheet" type="text/css" href="css/create_publication.css">


</head>
<body>
<?php include "cookie.php"; ?>
<section class="hide_div"></section>
<section class = "main" style="min-height: 312px">
    <div class = "public">
        <p>ADD PUBLICATION</p>
    </div>
   
    <form>
        <div class="form-group">
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Description">
        </div>
        <div class="form-group">
            <select class = "cen_sel">
                <option>Sport type</option>
                <option>cars</option>
                <option>month</option>
            </select>
        </div>
        <div class="form-group">
            <select class = "cen_sel">
                <option>Manufacture</option>
                <option>cars</option>
                <option>month</option>
            </select>
        </div>
        <div class="form-group">
            <select class = "cen_sel">
                <option>News type</option>
                <option>cars</option>
                <option>month</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-warning buts">Add publication</button>
        </div>
</form>
        
    
</section>

<?php include "footer.php"; ?>

</body>
</html>