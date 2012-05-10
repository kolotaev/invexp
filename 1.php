<?
// connect
$m = new Mongo();

// select a database
$db = $m->comedy;

// select a collection (analogous to a relational database's table)
$collection = $db->cartoons;

// add a record
$obj = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
$collection->insert($obj);

// add another record, with a different "shape"
$obj = array( "title" => "XKCD", "online" => true );
$collection->insert($obj);

// find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $obj) {
    echo $obj["title"] . "\n";
}
//phpinfo();
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

$e = "пофывпо оппо опопо";
$e = urlencode($e);
echo $e;
echo "<br>";
$e= urldecode($e);
echo $e;