<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" >
<link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
<!-- Latest compiled and minified JavaScript -->


</head>

<body>
<?php
define('MYSQL_SERVER', 'localhost');
define('MYSQL_DATABASE_NAME', $_SESSION['table']);
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
	@$names1 .= ''. $column['Field'] . '=:'. $column['Field'] . ',';
	
	@$names3 .= "':$column[Field]'=>$$column[Field],";
	
	@$names4 .= '
	$'. $column['Field'] . '='.'@$_POST['.'"'.$column['Field'].'"'.'];';
	
	@$form .= '<div class="form-group">
    <label >'.$column['Field'].'</label>
    <input type="text" class="form-control" name="'.$column['Field'].'" value="<?= $'.$column['Field'].' ?>" placeholder="'.$column['Field'].'">
  </div>
  
  ';
	
}		
		
$t= rtrim($names,",");
$t1= rtrim($names1,",");
$t2= rtrim($names3,",");
		
		
		
	}


	
	
?>
<div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
              
             <li class="dropdown active" >
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SQL <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li role="presentation" ><a href="InsertSQL">Insert</a></li>
            <li role="presentation"><a href="UpdateSQL">Update</a></li>
            <li role="presentation"><a href="Delete">Dell</a></li>
              </ul>
            </li>
            
               <li class="dropdown" >
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Select <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li role="presentation" ><a href="ItemSelect">Item Select</a></li>
            <li role="presentation"><a href="UpdateSQL">List Select</a></li>
            
              </ul>
            </li>
            
             <li role="presentation"><a href="clear">Clear All</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">UPDATE SQL</h3>
      </div>

      <div class="jumbotron">
   <form method="post">
  <div class="form-group">
     <label>
    
    <?= $_SESSION['table'] ?>  DB  Table List
  </label><br><br>



    <?php $sql = "SHOW TABLES";
 
//Prepare our SQL statement,
$statement = $pdo->prepare($sql);
 
//Execute the statement.
$statement->execute();
 
//Fetch the rows from our statement.
$tables = $statement->fetchAll(PDO::FETCH_NUM);
 
//Loop through our table names.
foreach($tables as $table){
    //Print the table name out onto the page.
   
	
	echo '<label class="radio-inline">
  <input type="radio" name="field" value="'.$table[0].'"> '.$table[0].'
</label>';
}?>
  </div>
  
  <button type="submit" class="btn btn-default">Get Code</button>
</form>
      </div>

      <div class="row marketing">

      
 

<?php  if(empty($form)){}else{echo '<div class="form-group">
    <label >FORM <small>  </small></label>
   <textarea class="form-control" rows="8"><form>'.$form.'</form></textarea> </div> ';}  ?>
	   
 
 
  <?php  if(empty($names4)){}else{echo '<div class="form-group">
    <label >$_POST</label>
   <textarea class="form-control" rows="8">'.$names4.'</textarea> </div> ';}  ?>    
      
      
<?php  if(empty($t)){}else{echo '<div class="form-group">
    <label >SQL</label>
   <textarea class="form-control" rows="8">$query = $db->prepare("UPDATE '.$field.' SET '.  explode(',', $t,2)[1].' WHERE '.current(explode(",", $names)).' = :'.current(explode(",", $names)).'");
$update = $query->execute(array(
'.$t2.' ));	
if ( $update ){	

echo "error";

	}
	
else{
	echo"ok";
}	</textarea> </div> ';}  ?>        
      
      
   
       
	

       	
       
       
       
       

      </div>

      <footer class="footer">
        <p>&copy; 2017 Mipoaap.</p>
      </footer>

    </div> <!-- /container -->







<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>





