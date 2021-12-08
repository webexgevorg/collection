<?php
class Search{
    public static $tblName='';
    public static $collId;
	
    static function MultipleSearch($conditions = array()){
        $sql = 'SELECT * FROM '.self::$tblName;
        $sql .= ' WHERE realese_id='.self::$collId;
        if(!empty($conditions) && is_array($conditions)){
            
            foreach($conditions as $key => $value){
                if(!empty($value)){
                    $sql .= " AND $key LIKE '". str_replace(' ','%',$value). "%'";
                }
            }
            $sql.=' ORDER BY id ASC ';
        }

        return $sql;
	}

    static function AllSearch($search_value, $conditions = array()){
        $sql = 'SELECT * FROM '.self::$tblName;
        $sql .= ' WHERE realese_id='.self::$collId;
        if(!empty($conditions) && is_array($conditions)){
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0) ? ' OR ' : ' AND ';
                $sql .= $pre. $key." LIKE '". str_replace(' ','%',$search_value). "%'";
                $i++;
            }
            
            $sql.=' ORDER BY id ASC ';
        }

        return $sql;
	}
}
       
?>

