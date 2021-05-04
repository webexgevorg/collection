<?php  
        class Pagination {
            public $tblName='';
            public $limit=8;
            public $page='';
            public $page_index='';
            public $links='';
            function __construct(){
               (isset($_GET["page"])) ? $this->page  = $_GET["page"] : $this->page=1;
               $this->page_index=($this->page-1) * $this->limit;

            }
            public function allItems($con, $data, $data_id){
                  $all_items_in_page=mysqli_query($con, "SELECT * FROM $this->tblName WHERE $data=$data_id LIMIT $this->page_index, $this->limit");
                  return $all_items_in_page;
            }

            public function checkRow( $conditions ){
                    $sql = 'SELECT * FROM '. $this->tblName;
                    if(!empty($conditions) && is_array($conditions)){
                         $sql .= ' WHERE ';
                         $i = 0;
                         foreach($conditions as $key => $value){
                              $pre = ($i > 0) ? ' AND ':'';
                              if(is_array($value)){
                                    foreach($value as $j => $v) {
                                        $pre = ($j > 0) ? ' OR ' : ' AND ';
                                        $sql .= $pre.$key." = '".$v."'";
                                    } 
                              }
                              else{
                                   $sql .= $pre.$key." = '".$value."'";
                              }
                            $i++;
                          }
                    }
                    else{
                      $sql="SELECT * FROM ". $this->tblName ." WHERE coll_id=$conditions";
                    }
                  return $sql;
             } 
            
             public function AllCards($conditions){
                $sql="(SELECT i.table_name AS t_name, c1.id, c1.name, c1.image FROM card1 c1, information_schema.tables i where coll_id=47 AND TABLE_NAME='card1') UNION ALL (SELECT i.table_name AS t_name, c2.id, c2.name, c2.image FROM card2 c2, information_schema.tables i where coll_id=47 AND TABLE_NAME='card2') UNION ALL (SELECT i.table_name AS t_name, c3.id, c3.name, c3.image FROM card3 c3, information_schema.tables i where coll_id=47 AND TABLE_NAME='card3')";
                //  $sql="(SELECT id, name, image FROM card1 where coll_id=$conditions ) UNION ALL ( SELECT id, name, image FROM card2 where coll_id=$conditions ) UNION ALL ( SELECT id, name, image FROM card3 where coll_id=$conditions )";
                 return $sql;
            }
            
             public function CollectionCardItems($con, $conditions = array()){
                 if(is_array($conditions)){
                     $sel_items=$this->checkRow($conditions);
                 }
                 else{
                  $sel_items=$this->AllCards($conditions);
                 }
                  $sel=$sel_items." LIMIT $this->page_index, $this->limit";
                  $all_items_in_page=mysqli_query($con, $sel);
                  return $all_items_in_page;
            }
            
            public function pages($con, $conditions ){
                // $all_items=mysqli_query($con, "SELECT * FROM $this->tblName WHERE $data_coll=$coll_id AND $data_user=$user_id");
              if(is_array($conditions)){
                   $select=$this->checkRow( $conditions );
              }
              else{
                   $select=$this->AllCards( $conditions );
              }
                $all_items=mysqli_query($con, $select);
                $data_count = mysqli_num_rows($all_items); 
                if($data_count>8){
                $total_pages = ceil($data_count / $this->limit);  
                ?>
                    <li class="<?php echo $this->page <= 1 ? 'disabled' : ''; ?>">
                       <a class='pg-link' href="<?php echo $this->page <= 1 ? '' : $_SERVER['PHP_SELF']."?page=".($this->page - 1); ?>">Prev</a>
                    </li>
                <?php
                $first='';
                $last='';
                    for ($i = 1; $i <= $total_pages; $i++) {
                          
                     if($total_pages>4){
                        if( $i<4 && $this->page<3 ){
                            $this->links.= ($i != $this->page ) 
                                           ? "<li class='page-item'><a class='pg-link' href='".$_SERVER['PHP_SELF']."?page=$i'> $i</a> </li>"
                                           : "<li class='page-item active-page'>$i</li>";
                            $last="<li>. . .</li><li class='page-item'><a class='pg-link' href='".$_SERVER['PHP_SELF']."?page=$total_pages'> $total_pages</a></li>";
                            $first='';

                        }
                        else if( $this->page>=3 && $this->page<=$total_pages-2 && $i>=$this->page-1 && $i<=$this->page+1){
                             $this->links.=($i != $this->page )
                                           ? "<li class='page-item'><a class='pg-link' href='".$_SERVER['PHP_SELF']."?page=$i'> $i</a></li>"
                                           :"<li class='page-item active-page'>$i</li>";
                            $first="<li class='page-item'><a class='pg-link' href='".$_SERVER['PHP_SELF']."?page=1'> 1</a></li><li>. . .</li>";
                            $last="<li>. . .</li><li class='page-item'><a class='pg-link' href='".$_SERVER['PHP_SELF']."?page=$total_pages'> $total_pages</a></li>";
                        }
                        else if($i>=$total_pages-2 && $this->page>$total_pages-2){
                            $this->links.=($i != $this->page )
                                          ? "<li class='page-item'><a class='pg-link' href='".$_SERVER['PHP_SELF']."?page=$i'> $i</a> </li>"
                                          : "<li class='page-item active-page'>$i</li>";
                            $last='';
                            $first="<li class='page-item'><a class='pg-link' href='".$_SERVER['PHP_SELF']."?page=1'> 1</a></li><li>. . .</li>";
                        }
                        else{}
                    }
                    else{
                      $this->links.="<li class='page-item'><a class='pg-link' href='".$_SERVER['PHP_SELF']."?page=$i'> $i</a> </li>";
                    }
                   }
                    echo $first.$this->links.$last;
                ?>
    
                <li class="<?php if($this->page >= $total_pages){ echo 'disabled'; } ?>">
                    <a class='pg-link' href="<?php if($this->page >= $total_pages){ echo '#'; } else { echo $_SERVER['PHP_SELF']."?page=".($this->page + 1); } ?>">Next</a>
                </li>
   
<?php
              }
            }
        }    
?>