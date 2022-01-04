<?php
session_start();
include "../config/con1.php";
include "../classes/table.php";

if(isset($_COOKIE['user']) || isset($_SESSION['user'])){
    if(!empty($_COOKIE['user'])){
        $user_id=$_COOKIE['user'];
    }
    if(!empty($_SESSION['user'])){
        $user_id=$_SESSION['user'];
    }
   
}
if(isset($_POST['page'])){
    $content='';
    $tables=new Tables();
    $tables->tblName = "users";
    $tables->limit = $_POST["limit"];
    $table=$tables->UsersTable($con);

    if($table) {
        $count = $tables -> start;
        while($row = mysqli_fetch_assoc($table)) {
            $count ++;
            if($row["active"] == 1) {
                $content .= "<tr data-id='" . $row['id'] . "'>
                    <td>" . $count . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["country"] . "</td>
                    <td>" .  $row["city"] . " </td>
                    <td>" .  $row["birth_day"] . " </td>
                    <td class='icon'><i class='disabled fa fa-minus-circle' data-disabled='0'></i></td>
                </tr>";
        }else {
            $content .= "<tr class='disabled_tr' data-id='" . $row['id'] . "'>
                    <td>" . $count . "</td>
                    <td>" . $row["name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["country"] . "</td>
                    <td>" .  $row["city"] . " </td>
                    <td>" .  $row["birth_day"] . " </td>
                    <td class='icon'><i class='disabled fa fa-check-circle' data-disabled='1'></i></td>
                    </tr>";
        }
            }
        echo $content;

    }

}

?>