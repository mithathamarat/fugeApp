<?php
session_start();
 if(isset($_POST['btn-name']))
 {
	 


function recurse_copy($src,$dst) {
$dir = opendir($src);
@mkdir($dst);
while(false !== ( $file = readdir($dir)) ) {
if (( $file != '.' ) && ( $file != '..' )) {
if ( is_dir($src . '/' . $file) ) {
recurse_copy($src . '/' . $file,$dst . '/' . $file);
}
else {
copy($src . '/' . $file,$dst . '/' . $file);
}
}
}
closedir($dir);
}
$src = '../../master';
$dst = '../../../'.$_SESSION['project'].'';
recurse_copy($src,$dst);

@$db=$_POST["db"];
$_SESSION['db'] = $db;


define('MYSQL_SERVER', 'localhost');
define('MYSQL_DATABASE_NAME', $_SESSION['db']);
define('MYSQL_USERNAME', 'root');
define('MYSQL_PASSWORD', '');
 
$pdo = new PDO(
        'mysql:host=' . MYSQL_SERVER . ';dbname=' . MYSQL_DATABASE_NAME, 
        MYSQL_USERNAME, 
        MYSQL_PASSWORD
);


$sql = "SHOW TABLES";
 

$statement = $pdo->prepare($sql);

$statement->execute();

$tables = $statement->fetchAll(PDO::FETCH_NUM);

foreach($tables as $table){

@$listtable .=''.$table[0].',';   

}







$inf=fopen('../../../'.$_SESSION['project'].'/FugeInfo.php','w');
fwrite($inf, 'Project Name:'.$_SESSION['project'].'
Datebase Name: '.$db.'
Project Folder:**localhost/'.$_SESSION['project'].'
Creation date: '.date("Y-m-d h:i:s").'
DB Tables:  '.rtrim($listtable,",").'

LOG ');
fclose($inf);




$dbcnf=fopen('../../../'.$_SESSION['project'].'/dbconnect.model.php','w');
fwrite($dbcnf, '<?php
try {
     $db = new PDO("mysql:host=localhost;dbname='.$db.';charset=utf8", "root", "");
} catch ( PDOException $e ){
     print $e->getMessage();
}

?>

');
fclose($dbcnf);




echo 1;

	 }




		
?>





