<?php
$arr = array(
	'0'=>array(
		'sid'  => 110000,
		'sname'=> '安阳'
	),
	'1'=>array(
		'sid'  => 110001,
		'sname'=> '爱的告白'
	),
	'2'=>array(
		'sid'  => 110002,
		'sname'=> '林路同'
	),
	'3'=>array(
		'sid'  => 110003,
		'sname'=> '王木生'
	),
	'4'=>array(
		'sid'  => 110004,
		'sname'=> '杨过'
	),
	'5'=>array(
		'sid'  => 110005,
		'sname'=> '李白'
	),
	'6'=>array(
		'sid'  => 110006,
		'sname'=> '杜甫'
	),
	'7'=>array(
		'sid'  => 110007,
		'sname'=> '杜牧'
	),
	'8'=>array(
		'sid'  => 110008,
		'sname'=> '叶步青'
	),
	'9'=>array(
		'sid'  => 110009,
		'sname'=> '习大大'
	),
	'10'=>array(
		'sid'  => 110010,
		'sname'=> '彭丽媛'
	),
	'11'=>array(
		'sid'  => 110011,
		'sname'=> '温家宝'
	),
	'12'=>array(
		'sid'  => 110012,
		'sname'=> '吕布'
	),
	'13'=>array(
		'sid'  => 110013,
		'sname'=> '陈平'
	),
	'14'=>array(
		'sid'=>110014,
		'sname'=>'江疏影'
	),
	'15'=>array(
		'sid'=>110015,
		'sname'=>'黑貓警長3'
	),
	'16'=>array(
		'sid'=>110016,
		'sname'=>'林中路'
	),
	'17'=>array(
		'sid'=>110017,
		'sname'=>'疏飞'
	),
	'18'=>array(
		'sid'=>110018,
		'sname'=>'疏梓龙'
	),
	'19'=>array(
		'sid'=>110019,
		'sname'=>'刘邦'
	),
	'20'=>array(
		'sid'=>110020,
		'sname'=>'朱元璋'
	),
	'21'=>array(
		'sid'=>110021,
		'sname'=>'周勃'
	),
	'22'=>array(
		'sid'=>110022,
		'sname'=>'泰隆'
	),
	'23'=>array(
		'sid'=>110023,
		'sname'=>'徐达'
	),
	'24'=>array(
		'sid'=>110024,
		'sname'=>'曹操'
	),
);
echo "<pre>";
$settlesRes = array(); 
$i = 1; 	//避免姓名去重
foreach ($arr as $k=>$v) {  
	$sname = $v['sname'];   
	$snameFirstChar = _getFirstCharter($sname); 				//取出姓名的第一个汉字的首字母  
	$settlesRes[$snameFirstChar][$i]['sname'] = $v['sname'];	//以这个首字母作为key 
	$settlesRes[$snameFirstChar][$i]['sid'] = $v['sid'];
	$i++;
}           
ksort($settlesRes); 	//对数据进行ksort排序，以key的值升序排序 
//var_dump($settlesRes); 
foreach($settlesRes as $k=>$v){
	echo $k.'<br />';
	foreach($v as $kk=>$vv){
		echo $vv['sid'].'----'.$vv['sname'].'<br />';
	}
}
/**
* 取汉字的第一个字的首字母
* @param type $str
* @return string|null
*/
function _getFirstCharter($str){
	if(empty($str)){
		return '';
	}
	$fchar=ord($str{0});
	if($fchar>=ord('A')&&$fchar<=ord('z')) {
		return strtoupper($str{0});
	}
	$s1=iconv('UTF-8','GBK',$str);
	$s2=iconv('GBK','UTF-8',$s1);
	$s=$s2==$str?$s1:$str;
	$asc=ord($s{0})*256+ord($s{1})-65536;
	if($asc>=-20319&&$asc<=-20284) return 'A';
	if($asc>=-20283&&$asc<=-19776) return 'B';
	if($asc>=-19775&&$asc<=-19219) return 'C';
	if($asc>=-19218&&$asc<=-18711) return 'D';
	if($asc>=-18710&&$asc<=-18527) return 'E';
	if($asc>=-18526&&$asc<=-18240) return 'F';
	if($asc>=-18239&&$asc<=-17923) return 'G';
	if($asc>=-17922&&$asc<=-17418) return 'H';
	if($asc>=-17417&&$asc<=-16475) return 'J';
	if($asc>=-16474&&$asc<=-16213) return 'K';
	if($asc>=-16212&&$asc<=-15641) return 'L';
	if($asc>=-15640&&$asc<=-15166) return 'M';
	if($asc>=-15165&&$asc<=-14923) return 'N';
	if($asc>=-14922&&$asc<=-14915) return 'O';
	if($asc>=-14914&&$asc<=-14631) return 'P';
	if($asc>=-14630&&$asc<=-14150) return 'Q';
	if($asc>=-14149&&$asc<=-14091) return 'R';
	if($asc>=-14090&&$asc<=-13319) return 'S';
	if($asc>=-13318&&$asc<=-12839) return 'T';
	if($asc>=-12838&&$asc<=-12557) return 'W';
	if($asc>=-12556&&$asc<=-11848) return 'X';
	if($asc>=-11847&&$asc<=-11056) return 'Y';
	if($asc>=-11055&&$asc<=-10247) return 'Z';
	return null;
}
