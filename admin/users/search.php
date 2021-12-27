<?php

require "../../config/con1.php";

$search = $_POST["search"];

$sql = "SELECT * FROM users WHERE name like '%$search%'";
echo $sql;