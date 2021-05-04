<?php


class Collections{

	static function Collection($con, $coll_id){
        $sql_collection="SELECT name_of_collection AS name, image, description FROM new_collection_card WHERE id=$coll_id";
        $res_collection = mysqli_query($con, $sql_collection);   
        if(mysqli_num_rows($res_collection)==1){
        	return mysqli_fetch_assoc($res_collection);
        }  
        else{
            return false;
        }  
	}
}
// ----------------Cards---------------------------------
class CardInfo{
    static function Card($con, $tblname, $card_id){
        $sql_cards="SELECT id, name_of_collection FROM collections WHERE id IN (SELECT releases_id FROM $tblname WHERE id=$card_id)";
        $res_card = mysqli_query($con, $sql_cards);   
        if(mysqli_num_rows($res_card)==1){
        	return mysqli_fetch_assoc($res_card);
        }    
	}
}
// ------------------count cards ------------------------------
class CountCards{
	public $count_cards;
    static function AllCards($con, $id){
       $sql_count_cards="SELECT sum(AllCount) AS Total_Count from ( (select count(user_id) AS AllCount from card1 WHERE user_id=$id) union all (select count(user_id) AS AllCount from card2 WHERE user_id=$id)union all select count(user_id) AS AllCount from card3 WHERE user_id=$id)t";
        $res_count_cards=mysqli_query($con, $sql_count_cards);
        $count_cards= mysqli_fetch_assoc($res_count_cards); 
        return $count_cards['Total_Count'];
	}
	static function Cards ($con, $coll_id, $user_id){
        $sql_count_cards="SELECT sum(AllCount) AS Total_Count from ( (select count(coll_id) AS AllCount from card1 WHERE user_id=$user_id AND coll_id=$coll_id) union all (select count(coll_id) AS AllCount from card2 WHERE user_id=$user_id AND coll_id=$coll_id)union all select count(coll_id) AS AllCount from card3 WHERE user_id=$user_id AND coll_id=$coll_id)t";
        $res_count_cards=mysqli_query($con, $sql_count_cards);
        $count_cards= mysqli_fetch_assoc($res_count_cards); 
        return $count_cards['Total_Count'];
	}
    static function CardsFirstFolder ($con, $folder_id, $user_id){
        $sql_count_cards="SELECT sum(AllCount) AS Total_Count from ( (select count(coll_id) AS AllCount from card2 WHERE folder_id=$folder_id) union all (select count(coll_id) AS AllCount from card3 WHERE folder_id IN (SELECT id FROM collection_second_folder WHERE first_folder_id=$folder_id)))t";
        $res_count_cards=mysqli_query($con, $sql_count_cards);
        $count_cards= mysqli_fetch_assoc($res_count_cards); 
        return $count_cards['Total_Count'];
    }
     static function CardsSecondFolder ($con, $folder_id, $user_id){
        $sql_count_cards="SELECT count(coll_id) AS AllCount from card3 WHERE folder_id=$folder_id";
        $res_count_cards=mysqli_query($con, $sql_count_cards);
        $count_cards= mysqli_fetch_assoc($res_count_cards); 
        return $count_cards['AllCount'];
    }
}


class Folders{
	
	static function AllFolders($con, $folder, $data_id, $id){
		$sql_folders="SELECT name_of_folder AS name, id FROM $folder WHERE $data_id=$id";
        $res_folders = mysqli_query($con, $sql_folders);   
        	return $res_folders;
	}
}
?>