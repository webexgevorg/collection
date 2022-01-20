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
                $pre = ($i > 0) ? ' OR ' : ' AND ( ';
                $sql .= $pre. $key." LIKE '". str_replace(' ','%',$search_value). "%'";
                $i++;
            }
            
            $sql.=' ) ORDER BY id ASC ';
        }

        return $sql;
	}

    static function DataTableWithSearch($search_value, $conditions = array(), $likes = array()){
        $sql = 'SELECT * FROM '.self::$tblName;
        if(!empty($conditions) && is_array($conditions)){
            $sql .= ' WHERE ';
            $i = 0;
            foreach($conditions as $key => $value){
                $pre = ($i > 0)?' AND ':'';
                $sql .= $pre.$key." = '".$value."'";
                $i++;
            }
        }
        if(!empty($likes) && is_array($likes) && !empty($search_value)){
            $i = 0;
            foreach($likes as $key => $value){
                $pre = ($i > 0) ? ' OR ' : ' AND ( ';
                $sql .= $pre. $key." LIKE '". str_replace(' ','%',$search_value). "%'";
                $i++;
            }
            $sql.=' )';
            
        }
        $sql.=' ORDER BY id ASC ';
        return $sql;
	}
}
       
?>

