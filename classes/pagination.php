<?php  
        class Pagination {
           
            public $limit=20;
            public $count_rows='';
            public $page=1;
            public $page_index='';
            public $links='';
            function __construct(){

                    (isset($_POST["page_table"])) ? $this->page  = $_POST["page_table"] : $this->page=1;
                    $this->page_index=($this->page-1) * $this->limit;
                    
            }
                     
            public function pages( ){
                // $all_items=mysqli_query($con, "SELECT * FROM $this->tblName WHERE $data_coll=$coll_id AND $data_user=$user_id");
                if($this->count_rows > $this->limit){
                $total_pages = ceil($this->count_rows / $this->limit);  
                $prev=  "";
                $next='';
               
                $first='';
                $last='';
                    for ($i = 1; $i <= $total_pages; $i++) {
                          
                     if($total_pages>10){
                        $disabled_prev= $this->page <= 1 ? 'btn disabled' : '';
                        $disabled_next=$this->page >= $total_pages ? 'btn disabled' : '';
                        $prev=  "<li class=' prev_item previous'>
                                    <a class='pg-link $disabled_prev' href='' data-value='".($this->page-1)."'>Prev</a>
                                </li>";
                        $next="<li class=' next_item next'>
                                    <a class='pg-link  $disabled_next' href='' data-value='".($this->page + 1)."'>Next</a>
                                </li>";
                        if( $i<10 && $this->page<9 ){
                            $this->links.= ($i != $this->page ) 
                                           ? "<li class='page-item'><a class='pg-link' href=''  data-value='$i'> $i</a> </li>"
                                           : "<li class='page-item active-page'>$i</li>";
                            $last="<li>. . .</li><li class='page-item'><a class='pg-link' href=''  data-value='$total_pages'> $total_pages</a></li>";
                            $first='';
                        }
                        else if( $this->page>=9 && $this->page<=$total_pages-2 && $i>=$this->page-1 && $i<=$this->page+1){
                             $this->links.=($i != $this->page )
                                           ? "<li class='page-item'><a class='pg-link' href=''  data-value='$i'> $i</a></li>"
                                           :"<li class='page-item active-page'>$i</li>";
                            $first="<li class='page-item'><a class='pg-link' href=''  data-value='1'> 1</a></li><li>. . .</li>";
                            $last="<li>. . .</li><li class='page-item'><a class='pg-link' href=''  data-value='$total_pages'> $total_pages</a></li>";
                        }
                        else if($i>=$total_pages-5 && $this->page>$total_pages-5){
                            $this->links.=($i != $this->page )
                                          ? "<li class='page-item'><a class='pg-link' href=''  data-value='$i'> $i</a> </li>"
                                          : "<li class='page-item active-page'>$i</li>";
                            $last='';
                            $first="<li class='page-item'><a class='pg-link' href=''  data-value='1'> 1</a></li><li>. . .</li>";
                        }
                        else{}
                    }
                    else{
                    //   $this->links.="<li class='page-item'><a class='pg-link' href='' data-value='$i'> $i</a> </li>";
                      $this->links.= ($i != $this->page ) 
                                           ? "<li class='page-item'><a class='pg-link' href=''  data-value='$i'> $i</a> </li>"
                                           : "<li class='page-item active-page'>$i</li>";
                    }
                   }
                   $medum= $first.$this->links.$last;
                
return $prev.$medum.$next;
              }
            }
        }    
?>