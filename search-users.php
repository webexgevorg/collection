<?php
include "header.php";
    if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
        if(!empty($_COOKIE['user'])){
            $user_id=$_COOKIE['user'];
        }
        if(!empty($_SESSION['user'])){
            $user_id=$_SESSION['user'];
        }
    }
?>

<link rel="stylesheet" type="text/css" href="css/navbar-body.css">
<link rel="stylesheet" type="text/css" href="css/index.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<!-- link fontawsome for like and dislike buttons -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

<link rel="stylesheet" type="text/css" href="css/news.css">

<link rel="stylesheet" type="text/css" href="css/publications.css">
<link rel="stylesheet" href="css/pagination.css">
<link rel="stylesheet" href="css/search_users.css?8">
</head>
<body>
    <?php
        include "cookie.php";

        $select_users = "SELECT * FROM users";
        $select_users_result = mysqli_query($con, $select_users);
        $content = "";

        while($users_rows = mysqli_fetch_assoc($select_users_result)) {
            $star_icons = "";
            if($users_rows['image'] != "") {
                $image = $users_rows['image'];
            }else {
                $image = "user-icon.svg";
            }

            if($users_rows["country"] != "") {
                $country = $users_rows['country'] . ", ";
            }else {
                $country = "no country, ";
            }

            if($users_rows["city"] != "") {
                $city = $users_rows['city'];
            }else {
                $city = "no city";
            }

            for($i = 0; $i < $users_rows["rating"]; $i++) {
                $star_icons .= '<i class="fa fa-star" style="font-size:12px; color:gold"></i>';
            }

            $content .= '<div class = "first_part">
                            <div class = "ci_logo_img">
                                <img src="./images_users/' . $image . '" alt="user image">
                            </div>
                            <p class = "user_name mb-0">' . $users_rows["name"] . '</p>
                            <p class = "country_city m-0">
                                <span>' . $country . '</span>
                                <span>' . $city . '</span>
                            </p>
                            <div>' .
                                $star_icons
                            . '</div>
                        </div>';
        }

        $country = '';
        $select_country = "SELECT country FROM users where country!='' Group BY country";
        $select_country_result = mysqli_query($con, $select_country);

        while($country_row = mysqli_fetch_assoc($select_country_result)) {
            $country .= '<option>' . $country_row["country"] . '</option>';
        }

        $city = '';
        $select_city = "SELECT city FROM users where city!='' Group BY city";
        $select_city_result = mysqli_query($con, $select_city);

        while($city_row = mysqli_fetch_assoc($select_city_result)) {
            $city .= '<option>' . $city_row["city"] . '</option>';
        }



    ?>

 <section class="hide_div"></section>
    <section class="section1 mt-5">
        <h3 class="text-center mb-5 font">Users</h3>
        <div class="my-5 container statistics-container">
           
             <div class="container section">
                <div class="d-flex">
                    <div class="flex-item-right p-2" style="flex:20%;">
                        <p style="letter-spacing: 1px">Apply filters</p>
                        <input type="text" class="form-control sel_inps" placeholder="Type name">
                        <input type="text" class=" form-control sel_inps search_country" placeholder="Type country">
                    <select class="sel select_country">
                        <option>Country</option>
                        <?= $country ?>
                    </select>
                     <input type="text" class=" form-control sel_inps search_city" placeholder="Type city">
                <select class="sel select_city">
                    <option>City</option>
                    <?= $city ?>
                </select>
                <hr>
                <p class="font-weight-bold">Raiting</p>
                <hr>
                <div class="select_rating">
                    <div>
                        <input type="checkbox" name="">
                        <i class="fa fa-star" ></i>
                    </div>
                    <div>
                        <input type="checkbox" name="">
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                    </div>
                    <div>
                        <input type="checkbox" name="">
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                    </div>
                    <div>
                        <input type="checkbox" name="">
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                    </div>
                    <div>
                        <input type="checkbox" >
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                        <i class="fa fa-star" ></i>
                    </div>

                </div>
                <hr>
                <button id="btn" class="w-50 clear_filter">clear filters</button>
                <button id="btn1" class="w-50 filter">Filter</button>
                <div class="filtration_status"></div>
            </div>
            <div class="flex-item-left text-center p-2" style="flex:80%;">
            <div class = "user_text">
                <h3>USERS</h3>
            </div>
            <div class="info p-1 d-flex direction-column flex-wrap">
                <?= $content ?>
            </div>
        </div>
    </section>
    <?php include "footer.php"?>

    <script src="user_js/search_users.js"></script>

   
</body>
</html>