<?php
function replace($string,$keyArray,$replacement,$i){ 
    $result=''; 
    if($i<(count($keyArray))){ 
        $strSegArray=explode($keyArray[$i],$string); 
        foreach ($strSegArray as $index=>$strSeg){ 
            $x=$i+1; 
            if($index==(count($strSegArray)-1)) 
                $result=$result.replace($strSeg,$keyArray,$replacement,$x); 
            else
                $result=$result.replace($strSeg,$keyArray,$replacement,$x).$replacement[$i];                 
        }      
        return $result; 
    } 
    else{
        return $string; 
    }
} 
$string=' 键名 数组可以同时含有 integer 和 string 类型的键名，12345678 因为 PHP 实际并不区分索引数组和关联数组。
如果对给出的值没有指定键名，则取当前最大的整数索引值，而新的键名将是该值加一。如果指定的键名已经有了值，则该值会被覆盖。'; 
$keyArray=array('数组','integer','2345','键名'); 
$replacement=array('AAAA','BBBB','CCCC','DDDD'); 
 
echo replace($string,$keyArray,$replacement,0);