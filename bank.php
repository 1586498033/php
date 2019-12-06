<?php
header('Content-type:text/html;charset=utf-8');    
require_once('bankList.php');  
function bankInfo($card,$bankList)    
{    
    $info = array();
	$card_8 = substr($card, 0, 8);  
	$card_6 = substr($card, 0, 6);  
	$card_5 = substr($card, 0, 5); 
	$card_4 = substr($card, 0, 4);  	
    if (isset($bankList[$card_8])) {    
		$info = array(
			'status' => 1,
			'info' => $bankList[$card_8]
		);  
        return $info;    
    }elseif (isset($bankList[$card_6])) {    
        $info = array(
			'status' => 1,
			'info' => $bankList[$card_6]
		);  
        return $info;   
    }elseif (isset($bankList[$card_5])) {    
        $info = array(
			'status' => 1,
			'info' => $bankList[$card_5]
		);  
        return $info;   
    }elseif (isset($bankList[$card_4])) {    
        $info = array(
			'status' => 1,
			'info' => $bankList[$card_4]
		);  
        return $info;    
    }else{
		$info = array(
			'status' => 0,
			'info' => '该卡号信息暂未录入银联系统中...'
		);  
        return $info; 
	}   
}    
//6214837910679824
//6222759501833743
var_dump(bankInfo('6214837910679824',$bankList));    