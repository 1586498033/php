<?php
phpinfo();
/*
echo md5('158649llt');

echo "<hr />";

function sum($n){
	$sum = 0;
	if($n == 1){
		return $sum = $n;
	}else{
		$sum = $n + sum($n-1);
		return $sum;
	}
}

echo sum(10);

echo "<hr />";

$str = "6228482308740747279";

echo substr($str,-4);

echo "<hr />";
*/
/* 手机号码改成如下格式 */

//$mobile = '18268807597';
//echo substr_replace($mobile,'****',3,4);
//echo '<br />';
//$idcard = '340823199105032931';	//取2931
//echo substr($idcard,-4);

/*
echo '<hr />';
$a = 3;
$b = 5;
if(($a = 5) || ($b = 7)){
	++$a;
	$b++;
}
echo $a. " " .$b;*/
/*
echo '<hr />';
$c = 4;
$d = 5;
if(($c = 6) || ($d = 7)){
	++$c;
	$d++;
}
echo $c " " .$d;
*/
/*
echo '<hr />';
echo base64_decode(aHR0cDovL2NrLnJvb3QxMTExLmNvbS91cC5naWY);

echo '<pre>';
echo date('Y-m-d H:i:s',1525881600);
echo '<br />';
echo strtotime('2018-05-10');

echo '<hr />';

$reserve_time = array('9.00','15.00');
$segment_time = (($reserve_time[1] - $reserve_time[0]))*2;
$interval_time = 30;
for($i=1;$i<$segment_time;$i++){
	if($interval_time*$i % 60 == 0){
		array_push($reserve_time,(sprintf('%0.2f',$reserve_time[0]+$interval_time*$i / 60)));
	}else{
		$time_str = substr_replace(sprintf('%0.2f',$reserve_time[0]+($interval_time*$i / 60)),"30",'-2',2);
		array_push($reserve_time,$time_str);
	}
}
sort($reserve_time);
foreach($reserve_time as $k=>&$v){
	$v = substr_replace($v,":","-3",1);
}
var_dump($reserve_time);
*/
/**  
* @desc 根据两点间的经纬度计算距离 
* @param float $lat 纬度值 
* @param float $lng 经度值 
*/ 
/*
function get_distance($lat1, $lng1, $lat2, $lng2){ 
	$earthRadius = 6367000; //approximate radius of earth in meters 
	$lat1 = ($lat1 * pi() ) / 180; 
	$lng1 = ($lng1 * pi() ) / 180; 
	$lat2 = ($lat2 * pi() ) / 180; 
	$lng2 = ($lng2 * pi() ) / 180; 
	$calcLongitude = $lng2 - $lng1; 
	$calcLatitude = $lat2 - $lat1; 
	$stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2); 
	$stepTwo = 2 * asin(min(1, sqrt($stepOne))); 
	$calculatedDistance = $earthRadius * $stepTwo; 
	return round($calculatedDistance); 
}

//距离排序
echo get_distance(31.25956,121.52609,31.1387600000,121.3858200000).'--古美';
echo '<hr />';
echo get_distance(31.25956,121.52609,31.2322600000,121.3925320000).'--华大';
echo '<hr />';
echo get_distance(31.25956,121.52609,31.2353500094,121.4304788772).'--长寿';
echo '<hr />';
echo get_distance(31.25956,121.52609,31.3207078467,121.4348309683).'--庙行';
echo '<hr />';
echo get_distance(31.25956,121.52609,31.3967726712,121.4955756816).'--友谊路店';

echo '<br />';

$a = array(
  array(
    'id' => 5698,
    'first_name' => '长寿',
    'last_name' => '9474',
  ),
  array(
    'id' => 4767,
    'first_name' => '庙行店',
    'last_name' => '11012',
  ),
  array(
    'id' => 3809,
    'first_name' => '古美店',
    'last_name' => '18920',
  ),
   array(
    'id' => 3810,
    'first_name' => '友谊路店',
    'last_name' => '15520',
  ),
  array(
    'id' => 3811,
    'first_name' => '华大店',
    'last_name' => '13046',
  )
);

$last_names = array_column($a, 'last_name');
print_r($last_names);

array_multisort(array_column($a,'last_name'),SORT_ASC,$a);
echo '<pre>';
var_dump($a);

echo md5(123456);
*/

//纯数字的四位随机数
//echo '纯4位数字：';
//echo rand(1000,9999);	
//数字和字符混搭的四位随机字符串：

//echo '<hr />';

function GetRandStr($len) 
{ 
    $chars = array( 
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",  
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",  
        "3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);   
    $output = ""; 
    for ($i=0; $i<$len; $i++) 
    { 
        $output .= $chars[mt_rand(0, $charsLen)]; 
    }  
    return $output;  
} 
echo "数字和字符混搭的四位随机字符串：".GetRandStr(4);
