<?php
session_start();
 if(isset($_POST['btn-name']))
 {
define('MYSQL_SERVER', 'localhost');
define('MYSQL_DATABASE_NAME', $_SESSION['db']);
define('MYSQL_USERNAME', 'root');
define('MYSQL_PASSWORD', '');
 
$pdo = new PDO(
        'mysql:host=' . MYSQL_SERVER . ';dbname=' . MYSQL_DATABASE_NAME, 
        MYSQL_USERNAME, 
        MYSQL_PASSWORD
);	









$quefield=strip_tags( trim( @$_POST["field"]));





 if(empty($quefield)){}
	else{
$tableToDescribe = $quefield;
$statement = $pdo->query('DESCRIBE ' . $tableToDescribe);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $column){

    @$fields .= $column['Field'] . ',';
	
     @$degis .= '
	 <?= $row["'.$column['Field'].'"] ?>
	 ';
	@$dng .='
	'.$field.'.'.$column['Field'].',';
	
	@$dngexm .= '
	 $row["'.$column['Field'].'"] 
	 ';

}		
		
$fieldsrtrim= rtrim($fields,",");
$dngsrtrim = rtrim($dng,",");
}
	
	
	
$one=fopen('../../../'.$_SESSION['project'].'/query/'.$quefield.'query.php','w');
fwrite($one, '<?php /*Db Connection*/ 

$ID=$_GET["ID"];

$Sql = $db->prepare("SELECT * FROM '.$quefield.' WHERE '.current(explode(",", $fields)).'=:id");
$Sql->execute(array(":id"=>ID));
$row=$Sql->fetch(PDO::FETCH_ASSOC);
?>

'.$degis.'

');
fclose($one);
 
 if($one){$oneq= '<p><strong>Created:</strong> '.$quefield.'query.php    <i class="fa fa-folder-open" aria-hidden="true"></i> '.$_SESSION['project'].'/query/'.$quefield.'query.php  <i class="fa fa-clock-o" aria-hidden="true"></i> '.date("Y-m-d h:i:s").'</p>';}	
	
 $list=fopen('../../../'.$_SESSION['project'].'/query/'.$quefield.'list.php','w');
fwrite($list, '<?php /*Db Connection*/ 

$SQL = $db->prepare("SELECT
'.$dngsrtrim.'
FROM
'.$quefield.'
");
$SQL->execute();
while ($row = $SQL->fetch(PDO::FETCH_ASSOC))
{
/* echo */ 	
	
 '.$dngexm.' 
}

?>






<?php /*Db Connection*/ 

$SQL = $db->prepare("SELECT
'.$dngsrtrim.'
FROM
'.$quefield.'
WHERE
'.$quefield.'.XYZ = XYZ
ORDER BY
'.$quefield.'.XYZ ASC
LIMIT 0, 10
");
$SQL->execute();
while ($row = $SQL->fetch(PDO::FETCH_ASSOC))
{
/* echo */ 	
	
 '.$dngexm.' 
}

?>

');
fclose($list);
 
 if($list){$listq= '<p><strong>Created:</strong> '.$quefield.'list.php    <i class="fa fa-folder-open" aria-hidden="true"></i> '.$_SESSION['project'].'/query/'.$quefield.'list.php  <i class="fa fa-clock-o" aria-hidden="true"></i> '.date("Y-m-d h:i:s").'</p>';}
 	
	
	
	
	
	
	
$n=fopen('../../../'.$_SESSION['project'].'/FugeInfo.php','a');
fwrite($n, '

=>> Created: '.$quefield.'query.php  Path:'.$_SESSION['project'].'/query/'.$quefield.'query.php  #'.date("Y-m-d h:i:s").'
=>> Created: '.$quefield.'list.php  Path:'.$_SESSION['project'].'/query/'.$quefield.'list.php  #'.date("Y-m-d h:i:s").'');
fclose($n);
	
	
$new=''.$quefield.'que';	
		
$_SESSION[$new] = ''.$oneq.'
'.$listq.'';
		
	
echo $oneq;
echo $listq;

}
else {

echo "Hata döndü";



}






		
?>





