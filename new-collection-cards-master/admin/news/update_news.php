<?php
include "../../config/con1.php";


        $title = $_POST['title'];
        $discription = $_POST['discription'];
        $sporttype = $_POST['sporttype'];
        $producer = $_POST['producer'];
        $newstype= $_POST['newstype'];
        $id=$_POST['this_id'];
        $important=intval($_POST['important']);
        

        $img1=$_FILES['img1']['name'];
        $tmp1=$_FILES['img1']['tmp_name'];

       
        $img2=$_FILES['img2']['name'];
        $tmp2=$_FILES['img2']['tmp_name'];
        
        $img3=$_FILES['img3']['name'];
        $tmp3=$_FILES['img3']['tmp_name'];




 
        $sql_all_news="SELECT * FROM news where id='$id'";
        $query=mysqli_query($con,$sql_all_news);
        $row=mysqli_fetch_assoc($query);
        $pp=0;

        

        $valid_extantion=array('jpg','jpeg','png','gif');
       
        $sql1="UPDATE news  SET title='$title', discription='$discription',sport_type='$sporttype', producer='$producer',news_type='$newstype',important='$important'";
        if($img1!=0){
            $extantion=pathInfo($_FILES['img1']['name'],PATHINFO_EXTENSION);
            if(in_array($extantion,$valid_extantion)){
                if(is_file($row['img1'])){
                    unlink("uploads/".$row['img1']);
                    $new_name=rand().".".$extantion;
                    $destination="uploads/".$new_name;
                }else{
                    $new_name=rand().".".$extantion;
                    $destination="uploads/".$new_name;
                }
               
                
                move_uploaded_file($tmp1,$destination);

                $sql1.=",img1='".$new_name."'";
            }else{

            }

         }
         if($img2!=0){
            $extantion=pathInfo($_FILES['img2']['name'],PATHINFO_EXTENSION);
          
            if(in_array($extantion,$valid_extantion)){
                if(is_file($row['img2'])){
                    unlink("uploads/".$row['img2']);
                    $new_name=rand().".".$extantion;
                    $destination="uploads/".$new_name;
                }else{
                    $new_name=rand().".".$extantion;
                    $destination="uploads/".$new_name;
                }
               
              
                move_uploaded_file($tmp2,$destination);

                $sql1.=",img2='".$new_name."'";
            }else{
                echo "<p class='text-danger'>The image dasent match extantion</p>";
            }
           
         }
     
         if($img3!=0){
            $extantion=pathInfo($_FILES['img3']['name'],PATHINFO_EXTENSION);
             $k="uploads/".$row['img3'];
            if(in_array($extantion,$valid_extantion)){
                if(is_file($row['img3'])){
                    unlink("uploads/".$row['img3']);
                    $new_name=rand().".".$extantion;
                    $destination="uploads/".$new_name;
                }else{
                    $new_name=rand().".".$extantion;
                    $destination="uploads/".$new_name;
                }
             
              
                move_uploaded_file($tmp3,$destination);

                $sql1.=",img3='".$new_name."'";
            }
         }
         $sql1.="WHERE id='$id'";
        
   
       
           $query=mysqli_query($con,$sql1);
            if($query){
                echo "<p class='text-success'>The record has been successfully updated</p>";
            }else{
                echo "no".mysqli_error();
            }
   
    
?>
