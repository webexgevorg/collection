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
    $tables->tblName = $_POST["table_name"];
    $tables->limit = $_POST["limit"];


        if($_POST["table_name"] == "users") {
            $table=$tables->UsersTable($con);
            $count = $tables -> start;
            if($table) {
                while ($row = mysqli_fetch_assoc($table)) {
                    $count++;
                    if ($row["active"] == 1) {
                        $content .= "<tr data-id='" . $row['id'] . "'>
                        <td>" . $count . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["country"] . "</td>
                        <td>" . $row["city"] . " </td>
                        <td>" . $row["birth_day"] . " </td>
                        <td class='icon'>
                            <i class='disabled fa fa-minus-circle' data-disabled='0'></i>
                            <i class='fa fa-info-circle select_user' ></i>
                        </td>
                    </tr>";
                    } else {
                        $content .= "<tr class='disabled_tr' data-id='" . $row['id'] . "'>
                        <td>" . $count . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["country"] . "</td>
                        <td>" . $row["city"] . " </td>
                        <td>" . $row["birth_day"] . " </td>
                        <td class='icon'>
                            <i class='disabled fa fa-check-circle' data-disabled='1'></i>
                            <i class='fa fa-info-circle select_user' ></i>
                        </td>
                        </tr>";
                    }
                }
            }
        }

        else if($_POST["table_name"] == "contact_message") {
            $conditions=array('status' => $_SESSION['status_publications']);
            $table=$tables->ContactsTable($con, $conditions);
            $count = $tables -> start;
            if($table) {
                while ($row = mysqli_fetch_assoc($table)) {
                    $count++;
                    $content .= "<tr name=''>
                                <td class=''>" . $count . "</td>
                                <td class=''>" . $row['name'] . "</td>
                                <td class=''>" . $row['email'] . "</td>
                                <td class=''>" . $row['message'] . "</td>
                                <td class=''>" . $row['date'] . "</td>
                                <td class='text-right d-flex flex-column' data-id='" . $row['id'] . "'> 
                                    <a href='#' id=" . $row['id'] . " class='btn btn-link change-status " . $btn_status . "'  name='" . $change_contact_status . "'>" . $icon . "</a>
                                    <a href='#' class='btn btn-link btn-danger remove' data_name=''>
                                        <i class='fa fa-times '></i>
                                    </a>
                                </td>
                           </tr>";
                }
            }
        }

        else if($_POST["table_name"] == "messages_for_change_profile_name") {
            $table=$tables->Table($con);
            $count = $tables -> start;
            if($table) {
                while ($row = mysqli_fetch_assoc($table)) {
                    $count++;
                    $content .= "<tr name='' data-id='".$row['id']."'>
                                <td class=''>".$count."</td>
                                <td class='user_id'>".$row['user_id']."</td>
                                <td class=''>".$row_user['name']."</td>
                                <td class='new_profile_name'>".$row['new_profile_name']."</td>
                                <td class=''>".$row['message']."</td>
                                <td class=''>".$row['date']."</td>
                                <td class=''>".$row['status']."</td>
                                <td class='text-right'>
                                    <div class='chnge-name text-warning' ><i class='fa fa-edit '></i></div>
                                    
                                </td>
                            </tr>";
                }
            }
        }

        else if($_POST["table_name"] == "publications") {
            $table=$tables->ContactsTable($con, $conditions);
            $count = $tables -> start;
            if($table) {
                while ($row = mysqli_fetch_assoc($table)) {
                    $count++;
                    $content .= "<tr name=''>
                                <td class=''>".$count."</td>
                                <td class=''>".$row['title']."</td>
                                <td class=''>".$row['titledescription']."</td>
                                <td class=''>".$row['sport_type']."</td>
                                <td class=''>".$row['producer']."</td>
                                <td class=''>".$row['news_type']."</td>
                                <td class=''>".$row['created_date']."</td>
                                <td class='text-right d-flex flex-column' data-id='".$row['id']."' class='btn btn-link btn-marning edit'> 
                                    <a href='..piblications/add_publications.php?id=".$row['id']."'></a>   
                                    <a href='#' class='btn btn-link change-status ".$btn_status."'  name='".$change_contact_status."'>".$icon."</a>
                                    <a href='#' class='btn btn-link btn-danger remove' data_name=''>
                                        <i class='fa fa-times '></i>
                                    </a>
                                </td>
                           </tr>    ";
                }
            }
        }

    echo $content;


}

?>