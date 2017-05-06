<?php session_start(); 

date_default_timezone_set("Europe/Istanbul");?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fuge App |  <?= $_SESSION['project'] ?></title>
<link rel="icon" type="image/png" href="favicon.png" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" >
<link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="scrips/toastr/toastr.css">
<!-- Latest compiled and minified JavaScript -->
<style>
 .upform{padding-top:20px;padding-bottom:18px;margin-bottom:10px;color:inherit;background-color:#eee}.upform .h1,.upform h1{color:inherit}.upform p{margin-bottom:15px;font-size:21px;font-weight:200}.upform>hr{border-top-color:#d5d5d5}.container .upform,.container-fluid .upform{padding-right:15px;padding-left:15px;border-radius:6px}.upform .container{max-width:100%}@media screen and (min-width:768px){.upform{padding-top:20px;padding-bottom:18px}.container .upform,.container-fluid .upform{padding-right:60px;padding-left:60px}.upform .h1,.upform h1{font-size:63px}}


.upform {
  text-align: center;
  border-bottom: 1px solid #e5e5e5;
}
.upform .btn {
  padding: 4px 14px;
  font-size: 21px;
}
</style>
<script type="text/javascript">
function opi() {
	window.open("../../<?= $_SESSION['project']?>","Project: <?= $_SESSION['project'] ?>",'resizable=yes, height=800, width=1000');
}

</script>
</head>

<body>

<div class="container">
      <div class="header clearfix">
        <nav >
          <ul class="nav nav-pills pull-right">
          
           <li class="dropdown active" >
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Operation <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li role="presentation" class="active" ><a href="tableSelect">Insert+Update+Delete</a></li>
            <li role="presentation"><a href="Query">Query</a></li>
           
              </ul>
            </li>
          
          <li role="presentation"><a href="clear"><i class="fa fa-plus" aria-hidden="true"></i> New Project</a></li>

            
             <li role="presentation"><a href="delete"><i class="fa fa-trash" aria-hidden="true"></i> Delete Project</a></li>
          </ul>
        </nav>
        <h3 class="text-muted"><i class="fa fa-cube" aria-hidden="true"></i> Project: <?= $_SESSION['project'] ?></h3>
      </div>

      <div class="upform">
   <form id="insupdel-form">
  <div class="form-group">
     <label>
    
    <?= $_SESSION['db'] ?>  DB  Table List
  </label><br><br>



    <?php
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

@$iudsesion .=$_SESSION[''.$table[0].'iud'];
	
	echo '<label class="radio-inline">
  <input type="radio" name="field" value="'.$table[0].'"> '.$table[0].'
</label>';
}?>
  </div>
  
  <button type="submit" id="submit" name="btn-name" class="btn btn-default"><i class="fa fa-cog" aria-hidden="true"></i> Create Files</button>
</form>
  </div>
  <div class="text-center"><i class="fa fa-files-o" aria-hidden="true"></i> Generates Insert+Update+Delete codes and files</div>    
      
   <div class="text-center" id="folder" style="padding-top:10px; display:none; "><a    onclick="opi()" class="btn btn-default"><i class="fa fa-folder-open" aria-hidden="true"></i> Open project folder</a> </div>
      <div class="row" id="code" style="background-color:#2d3639;  padding:15px; margin-top:20px;">
  
    <code style=" color:#F5F5F5;" id="info">  
      
  <?php if(empty($iudsesion)){}else{echo $iudsesion;} ?>   
       	
       
       
    </code>   
       

      </div>
      

      <footer class="footer">
        <p>&copy; 2017 Fuge App.</p>
      </footer>

    </div> <!-- /container -->








<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>
<script src="scrips/validation.min.js"></script>
<script src="scrips/insupdel.js"></script>
<script src="scrips/toastr/toastr.min.js"></script>
<script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}		
	</script>
</body>
</html>