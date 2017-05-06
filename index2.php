<?php

@$table=$_POST["table"];


 if(empty($table)){}
else{
 session_start();		
$_SESSION['table'] = $table;
 header("Location:InsertSQL");	
	
}		
?>
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

<div class="container">
      <div class="header clearfix">
       
        <h3 class="text-muted">PDO SQL GEN</h3>
      </div>

      <div class="jumbotron">
   <form method="post">
  <div class="form-group">
    
    <input type="text" class="form-control"  name="table" placeholder="Table Name">
  </div>
  
  <button type="submit" class="btn btn-default">Apply</button>
</form>
      </div>

     

      <footer class="footer">
         <p>&copy; 2017 Mipoaap.</p>
      </footer>

    </div> <!-- /container -->









<script src="bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>





