<?

$a=7;
$b=3;

if($a==$b) echo "same";
else echo "not";

echo " a= $a ; b= $b";

echo "<br/>";

$m = range(1,100);
$m=array_reverse($m);

for ($i=0; $i<count($m); $i++) {
echo $m[$i]."\t";
}

$s = implode($m, "|");
echo "<br>$s";

$r = array("j"=>89);
$record = array(
				array(78,67,67),
				array(0,333,5.555,2323,"ghghj"),
				"my"=>array("a"=>12,"b"=>55)
				);
echo "<pre>";
print_r($record);
echo "</pre>";

foreach ($record as $k=>$v) {
echo "<br>$k";
	foreach ($v as $k=>$v) {
	echo "-----$v";
	}
echo "<br>";
}

$a=array(array());
for ($i=0; $i<100; $i++) {
	for ($j=0; $j<100; $j++) {
	$a[$i][] = mt_rand(1,9);
	}
}

for ($i=0; $i<10; $i++) {
	for ($j=0; $j<10; $j++) {
	echo " ".$a[$i][$j]." ";
	}
echo "<br>";
}


$d=4;

if ($d==3 | go()) echo "<br>yes";
else echo"<br>no";

function go() {
echo "<br>ggggggggggggggg";
return true;
}
/*
//$f = fopen("http://invexp.vacau.com/index.php", "r");
while (!feof($f)) {
//echo fgets($f)."<br>";
}*/
?>