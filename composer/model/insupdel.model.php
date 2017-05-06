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


$field=strip_tags( trim( @$_POST["field"]));

 if(empty($field)){}
	else{
$tableToDescribe = $field;
$statement = $pdo->query('DESCRIBE ' . $tableToDescribe);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($result as $column){
    @$names .= $column['Field'] . ',';
	@$names1 .= ':'. $column['Field'] . ',';
	
	@$names3 .= "':$column[Field]'=>$$column[Field],";
	
	@$names4 .= '
	$'. $column['Field'] . '='.'@$_POST['.'"'.$column['Field'].'"'.'];';
	
	@$form .= '<div class="form-group">
    <label >'.$column['Field'].'</label>
    <input type="text" class="form-control" name="'.$column['Field'].'" placeholder="'.$column['Field'].'">
  </div>
  
  ';
	
}		
		
$t= rtrim($names,",");
$t1= rtrim($names1,",");
$t2= rtrim($names3,",");
}

$add=fopen('../../../'.$_SESSION['project'].'/insupdel/models/'.$field.'add.model.php','w');
fwrite($add, '<?php /*Db Connection*/ '.explode(';', $names4,2)[1].'



$sqlekle = "INSERT INTO '.$field.' ('.  explode(',', $t,2)[1].') VALUES ('. explode(',', $t1,2)[1].')";
$q = $db->prepare($sqlekle);
$q->execute(array('.explode(',', $t2,2)[1].'));			  
if ($q === true) {echo "Kayıt yapılamadı sistem bir hata ile karşılaştı.";}
else {echo "ok";}


?>');
fclose($add);
 
 if($add){$sadd= '<p><strong>Created:</strong> '.$field.'add.model.php     <i class="fa fa-folder-open" aria-hidden="true"></i> '.$_SESSION['project'].'/insupdel/models/'.$field.'add.model.php  <i class="fa fa-clock-o" aria-hidden="true"></i> '.date("Y-m-d h:i:s").'</p>';}





 $addForm=fopen('../../../'.$_SESSION['project'].'/insupdel/forms/'.$field.'add.form.php','w');
fwrite($addForm, '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>'.$field.'add.form</title>
</head>

<body>



<form method="post" action="../models/'.$field.'add.model.php" >'.$form.'
<button type="submit" class="btn btn-default">Submit</button></form>

</body>
</html>


');
fclose($addForm); 


if($addForm){$saddform= '<p><strong>Created:</strong> '.$field.'add.form.php     <i class="fa fa-folder-open" aria-hidden="true"></i> '.$_SESSION['project'].'/insupdel/forms/'.$field.'add.form.php  <i class="fa fa-clock-o" aria-hidden="true"></i> '.date("Y-m-d h:i:s").'</p>';}




$upForm=fopen('../../../'.$_SESSION['project'].'/insupdel/forms/'.$field.'update.form.php','w');
fwrite($upForm, '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>'.$field.'update.form</title>
</head>

<body>



<form method="post" action="../models/'.$field.'update.model.php" >'.$form.'
<button type="submit" class="btn btn-default">Submit</button></form>

</body>
</html>


');
fclose($upForm); 


if($upForm){$supform= '<p><strong>Created:</strong> '.$field.'update.form.php     <i class="fa fa-folder-open" aria-hidden="true"></i> '.$_SESSION['project'].'/insupdel/forms/'.$field.'update.form.php  <i class="fa fa-clock-o" aria-hidden="true"></i> '.date("Y-m-d h:i:s").'</p>';}




$update=fopen('../../../'.$_SESSION['project'].'/insupdel/models/'.$field.'update.model.php','w');
fwrite($update, '<?php /*Db Connection*/
'.$names4.'





$query = $db->prepare("UPDATE '.$field.' SET '.  explode(',', $t,2)[1].' WHERE '.current(explode(",", $names)).' = :'.current(explode(",", $names)).'");
$update = $query->execute(array(
'.$t2.' ));	
if ( $update ){	

echo "error";

	}
	
else{
	echo"ok";
}







?>


');
fclose($update); 

if($update){$sup= '<p><strong>Created:</strong> '.$field.'update.model.php     <i class="fa fa-folder-open" aria-hidden="true"></i> '.$_SESSION['project'].'/insupdel/models/'.$field.'update.model.php  <i class="fa fa-clock-o" aria-hidden="true"></i> '.date("Y-m-d h:i:s").'</p>';}






$delForm=fopen('../../../'.$_SESSION['project'].'/insupdel/forms/'.$field.'del.form.php','w');
fwrite($delForm, '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>'.$field.'del.form</title>
</head>

<body>
>
<form method="post" action="../models/'.$field.'del.model.php">
<div class="form-group">
    <label >'.current(explode(",", $names)).'</label>
    <input type="text" class="form-control" name="'.current(explode(",", $names)).'" value="<?= $'.current(explode(",", $names)).' ?>" placeholder="'.current(explode(",", $names)).'">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
  </form>
</body>
</html>


');
fclose($delForm); 
if($delForm){$sdelform='<p><strong>Created:</strong> '.$field.'del.form.php     <i class="fa fa-folder-open" aria-hidden="true"></i> '.$_SESSION['project'].'/insupdel/forms/'.$field.'del.form.php  <i class="fa fa-clock-o" aria-hidden="true"></i> '.date("Y-m-d h:i:s").'</p>';}

 $del=fopen('../../../'.$_SESSION['project'].'/insupdel/models/'.$field.'del.model.php','w');
fwrite($del, '<?php /*Db Connection*/
$'.current(explode(",", $names)).'=$_POST["'.current(explode(",", $names)).'"];



$query = $db->prepare("DELETE FROM '.$field.' WHERE '.current(explode(",", $names)).' = :'.current(explode(",", $names)).'");
$sil = $query->execute(array(
   '.current(explode(",", $t2)).'
));	





?>');
fclose($del); 

if($del){$sdel= '<p><strong>Created:</strong> '.$field.'del.model.php     <i class="fa fa-folder-open" aria-hidden="true"></i> '.$_SESSION['project'].'/insupdel/models/'.$field.'del.model.php  <i class="fa fa-clock-o" aria-hidden="true"></i> '.date("Y-m-d h:i:s").'</p>';}


$n=fopen('../../../'.$_SESSION['project'].'/FugeInfo.php','a');
fwrite($n, '

=>> Created: '.$field.'add.model.php  Path:'.$_SESSION['project'].'/insupdel/models/'.$field.'add.model.php  #'.date("Y-m-d h:i:s").'
=>> Created: '.$field.'add.form.php  Path:'.$_SESSION['project'].'/insupdel/forms/'.$field.'add.form.php  #'.date("Y-m-d h:i:s").'
=>> Created: '.$field.'update.model.php  Path:'.$_SESSION['project'].'/insupdel/models/'.$field.'update.model.php  #'.date("Y-m-d h:i:s").'
=>> Created: '.$field.'update.form.php  Path:'.$_SESSION['project'].'/insupdel/forms/'.$field.'update.form.php  #'.date("Y-m-d h:i:s").'
=>> Created: '.$field.'del.model.php  Path:'.$_SESSION['project'].'/insupdel/modelsl/'.$field.'del.model.php  #'.date("Y-m-d h:i:s").'
=>> Created: '.$field.'del.form.php  Path:'.$_SESSION['project'].'/insupdel/forms/'.$field.'del.form.php  #'.date("Y-m-d h:i:s").'');
fclose($n);






$new=''.$field.'iud';

$_SESSION[$new] = '
'.$sadd.'
'.$saddform.'
'.$sup.'
'.$supform.'
'.$sdel.'
'.$sdelform.'';





	
echo $_SESSION[$new];


}
else {

echo "Hata döndü";



}






		
?>





