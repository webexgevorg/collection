<?php
include "config/con1.php";
if(isset($_POST['releases_id'])){
  $data_name=$_POST['data_name'];
  $id=$_POST['releases_id'];
  if($data_name=='infographic'){
  $sql_cards="SELECT id, number_card_1, name_card_1, number_card_2, name_card_2, number_card_3, name_card_3 FROM collections WHERE id=$id";
  $result_cards=mysqli_query($con, $sql_cards);
  $row_cards=mysqli_fetch_assoc($result_cards);
                 echo '<div class="row"><div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 ">
                          <i>'.$row_cards['name_card_1'].': '.$row_cards['number_card_1'].' cards</i>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 ">
                          <i>'.$row_cards['name_card_2'].': '.$row_cards['number_card_2'].' cards</i>
                      </div>
                      <div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 ">
                           <i>'.$row_cards['name_card_3'].': '.$row_cards['number_card_3'].' cards</i>
                      </div> </div>';
                      // -------------------------------------------------------------
                          $count=0;
                          $count1=0;
                          $number=0;
                          $number2=0;
                          $count_p1=0;
                          $sql="SELECT id, realese_id, set_type, print_run FROM `base_checklist` WHERE realese_id=$id AND print_run!='' GROUP By set_type ORDER BY id ASC";
                          $result=mysqli_query($con, $sql);
                          $row_number=mysqli_num_rows($result);
                          
                                

                          while($row=mysqli_fetch_assoc($result)){
                            $count++; 
                            $count_pod=0;
                           
                               $set_type=$row['set_type'];
                               
                                // ----------for sub-item--variation-------------------
                                 $sql_pod11="SELECT COUNT(id) AS 'count' FROM `base_checklist` WHERE realese_id=$id AND set_type='$set_type'";
                                  $r=mysqli_query($con, $sql_pod11);
                                  $row_count=mysqli_fetch_assoc($r);
                                //   $row_n=mysqli_num_rows($r);
                                // ----------------------------------------------
                            //  if($count<=$row_number/2 ){
                                 
                               $sql_pod="SELECT variation FROM `base_checklist` WHERE set_type='$set_type' AND realese_id=$id AND print_run!='' GROUP BY variation ORDER BY id ASC";
                               $result_parallel_pod=mysqli_query($con, $sql_pod);
                               $row_parallel_number_pod=mysqli_num_rows($result_parallel_pod);
                                 $row_num_pod=mysqli_num_rows($result_parallel_pod);
                                 // $width_pod=$row_num_pod*14;
                                 // $height_pod=$row_num_pod*120;
echo '<div class="row set-type-row"><div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 content"><div class="modalspan" style="font-weight: bold; font-size: 16px"><i>'.$count.'. '.$row['set_type'].'</i></div><div>'.$row_count['count'].'</div></div>';
                          echo '<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 ">';
                                 
                                // <div class="contentdiv">';
                             // ---------------------------
                           echo "<script type='text/javascript'>$( window ).resize(function() {
                                                
                                            $( window ).width();});</script>";
                                             
                          
                             echo '<div class="contentimg-all-1">
                            <div class="contentimg" >';
                          
                                 // -------------------------------- 
                                  while($row_pod=mysqli_fetch_assoc($result_parallel_pod)){
                                    $number++;

                                    // if($number<=$row_n/2){

                                    $count_pod++; 
                                    $p=0;
                                    $left=37;
                                    $left_box=10;
                                    $new_box='';
                                    
                                    $variation=$row_pod['variation'];
                            
                          $sql_parallel="SELECT color, MAX(print_run) AS 'print_run' FROM `base_checklist` WHERE set_type='$set_type' AND variation='$variation' AND realese_id=$id GROUP BY parallel ORDER BY id ASC";

                          $result_parallel=mysqli_query($con, $sql_parallel);
                          $row_parallel_number=mysqli_num_rows($result_parallel);
                          $row_num=mysqli_num_rows($result_parallel);
                                 $width=$row_num*5;
                                  // ---------------------------
                             echo '<span class="modalspan"><i>'.$count.'.'.$count_pod.'. '.$row_pod['variation'].'</i></span>';
                             echo '<div class="contentimg-all" >
                            <div class="contentimg" style="width: '.$width.'%">';
                          
                         
                          
                                 // --------------------------------
                                
                          while($row_parallel=mysqli_fetch_assoc($result_parallel)){
                            
                               if(!empty($row_parallel['color'])){
                                   $ex=explode('#', $row_parallel['color']);
                             
                                  if($row_parallel['color'][0]=='#'){
                                      $col="background:". $row_parallel['color'];
                                  }
                                  else{
                                      $col="background:url(admin/textures/". $row_parallel['color'].")";
                                  }
                            }
                            else{
                              $col="background:#257ec5";

                            }
                            if($p==0){
                              echo ' <div class="div_image box" style="left: 10px;'.$col.'">
                                       <div class="div_image_number_blok">
                                          <span class="boxspan">'.$row_parallel['print_run'].'</span>
                                       </div>
                                    </div>';
                                if($row_parallel_number!=1){
                                  echo '<img src="images/modal/line-1.png" class="all-lines line">';
                                }
                                else{
                                }
                            }
                            else{
                            echo ' <div class="div_image box'.$p.' '.$new_box.'"  style="left: '.$left_box.'px;'.$col.'" >
                                      <div class="div_image_number_blok">
                                           <span class="boxspan">'.$row_parallel['print_run'].'</span>
                                      </div>
                                   </div>';

                                if($p%2!=0 && $p!=$row_parallel_number-1){
                                  echo '<img src="images/modal/line-2.png" class="all-lines line'.$p.'" style="left: '.$left.'px">';
                                }
                                elseif($p%2==0 && $p!=$row_parallel_number-1){
                                  echo '<img src="images/modal/line-1.png" class="all-lines line'.$p.'" style="left: '.$left.'px">';
                                }
                                else{
                                }
                              }
                              $p++;
                              $left+=37;
                              $left_box+=37;
                              if($p%2==0){
                                        $new_box='even_box';
                                        
                                    }
                                    else{
                                        $new_box='odd_box';
                                    }
                          } 
                          echo '</div></div>';                            
                      } 
                        echo '</div></div></div></div>';                            
  
                       }
                    // }
                          
                    //       $sql="SELECT id, realese_id, set_type, print_run FROM `base_checklist` WHERE realese_id=$id AND print_run!='' GROUP By set_type ORDER BY id ASC";
                    //       $result=mysqli_query($con, $sql);
                    //       $row_number=mysqli_num_rows($result);
                    //       echo '<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 content">
                    //              <br>
                    //             <div class="contentdiv">';
                    //              // ----------for sub-item--variation-------------------
                    //              $sql_pod11="SELECT variation FROM `base_checklist` WHERE realese_id=$id AND print_run!='' GROUP BY variation ORDER BY id ASC";
                    //               $r=mysqli_query($con, $sql_pod11);
                    //               $row_n=mysqli_num_rows($r);
                    //             // ----------------------------------------------

                    //       while($row=mysqli_fetch_assoc($result)){
                    //         $count1++; 
                    //         $count_pod=0;
                           
                    //           $set_type=$row['set_type'];
                               
                    //          if($count1>$row_number/2 ){
                                 
                    //           $sql_pod="SELECT variation FROM `base_checklist` WHERE set_type='$set_type' AND realese_id=$id AND print_run!='' GROUP BY variation ORDER BY id ASC";
                    //           $result_parallel_pod=mysqli_query($con, $sql_pod);
                    //           $row_parallel_number_pod=mysqli_num_rows($result_parallel_pod);
                    //              $row_num_pod=mysqli_num_rows($result_parallel_pod);
                    //              // $width_pod=$row_num_pod*14;
                    //              // $height_pod=$row_num_pod*120;

                    //          // ---------------------------
                    //          echo '<span class="modalspan" style="font-weight: bold; font-size: 16px"><i>'.$count1.'. '.$row['set_type'].'</i></span>';
                    //          echo '<div class="contentimg-all-1">
                    //         <div class="contentimg" >';
                          
                    //              // -------------------------------- 
                    //               while($row_pod=mysqli_fetch_assoc($result_parallel_pod)){
                    //                 $number1++;

                    //                 // if($number<=$row_n/2){

                    //                 $count_pod++; 
                    //                 $p=0;
                    //                 $l=37;
                    //                 $new_box='';
                    //                 if($p%2==0){
                    //                     $new_box='even_box';
                    //                     echo $p%2;
                    //                 }
                    //                 else{
                    //                     $new_box='odd_box';
                    //                 }
                    //                 $variation=$row_pod['variation'];
                            
                    //       $sql_parallel="SELECT color, print_run FROM `base_checklist` WHERE set_type='$set_type' AND variation='$variation' AND realese_id=$id AND print_run!='' GROUP BY parallel ORDER BY id ASC";

                    //       $result_parallel=mysqli_query($con, $sql_parallel);
                    //       $row_parallel_number=mysqli_num_rows($result_parallel);
                    //       $row_num=mysqli_num_rows($result_parallel);
                    //              $width=$row_num*12;
                    //               // ---------------------------
                    //          echo '<span class="modalspan"><i>'.$count1.'.'.$count_pod.'. '.$row_pod['variation'].'</i></span>';
                    //          echo '<div class="contentimg-all" >
                    //         <div class="contentimg" style="width: '.$width.'%">';
                          
                    //              // --------------------------------
                                
                    //       while($row_parallel=mysqli_fetch_assoc($result_parallel)){
                            
                    //           if(!empty($row_parallel['color'])){
                    //               $ex=explode('#', $row_parallel['color']);
                             
                    //               if($row_parallel['color'][0]=='#'){
                    //                   $col="style='background:". $row_parallel['color']."'";
                    //               }
                    //               else{
                    //                   $col="style='background:url(admin/textures/". $row_parallel['color'].")'";
                    //               }
                    //         }
                    //         else{
                    //           $col="style='background:#257ec5'";

                    //         }
                    //         if($p==0){
                    //           echo ' <div class="div_image box"'.$col.' style="left: '.$l.'px">
                    //                   <div class="div_image_number_blok">
                    //                       <span class="boxspan">'.$row_parallel['print_run'].'</span>
                    //                   </div>
                    //                 </div>';
                    //             if($row_parallel_number!=1){
                    //               echo '<img src="images/modal/line-1.png" class="all-lines line">';
                    //             }
                    //             else{
                    //             }
                    //         }
                    //         else{
                    //         echo ' <div class="div_image box'.$p.' '.$new_box.'" '.$col.' style="left: '.$l.'px">
                    //                   <div class="div_image_number_blok">
                    //                       <span class="boxspan">'.$row_parallel['print_run'].'</span>
                    //                   </div>
                    //               </div>';

                    //             if($p%2!=0 && $p!=$row_parallel_number-1){
                    //               echo '<img src="images/modal/line-2.png" class="all-lines line'.$p.'" style="left: '.$l.'px">';
                    //             }
                    //             elseif($p%2==0 && $p!=$row_parallel_number-1){
                    //               echo '<img src="images/modal/line-1.png" class="all-lines line'.$p.'" style="left: '.$l.'px">';
                    //             }
                    //             else{
                    //             }
                    //           }
                    //           $p++;
                    //           $l+=37;
                    //           if($p%2==0){
                    //                     $new_box='even_box';
                    //                     echo $p%2;
                    //                 }
                    //                 else{
                    //                     $new_box='odd_box';
                    //                 }
                    //       } 
                    //       echo '</div></div>';                            
                    //   } 
                    //     echo '</div></div>';                            
  
                    //   }
                    // }
                    //       echo '</div></div>'; 
    }
    else{
      $sql_info="SELECT id, info FROM collections WHERE id=$id";
      $result_info=mysqli_query($con, $sql_info);
      $row_info=mysqli_fetch_assoc($result_info);
      echo $row_info['info'];
    }                      
}
else{
  echo 'no';
}
?>