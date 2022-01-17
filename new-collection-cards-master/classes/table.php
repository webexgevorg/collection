<?php
class Tables{
    public $tblName='';
    public $collId;
    public $limit=5;
    public $start=0;

    public function __construct(){
        if(isset($_POST['page'])){
            if($_POST['page']>1){
                $this->start = (($_POST['page']-1)*$this->limit);
            }else{
                $this->start=0;
            }
        }
    }
	
    function TableSportYear($con, $before_year, $after_year, $conditions = array()){

        $sql = 'SELECT * FROM '.$this->tblName;
        if(!empty($conditions) && is_array($conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        $sql .="AND SUBSTRING(year_of_releases, 1, 4) BETWEEN $before_year AND $after_year LIMIT ". $this->start.", ".$this->limit;
        $result = mysqli_query($con, $sql);
        return !empty(mysqli_num_rows($result) > 0) ? $result : false;
    }
}

?>

