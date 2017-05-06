<?php

@$path=$_POST["path"];


 if(empty($path)){}
else{

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
$src = 'master';
$dst = '../'.$path.'';
recurse_copy($src,$dst);

	
	
	
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
       
        <h3 class="text-muted">YP OLUŞTUR</h3>
      </div>

      <div class="jumbotron">
   <form method="post">
  <div class="form-group">
    
    <input type="text" class="form-control"  name="path" placeholder="Klasör yolu">
  </div>
  
  <button type="submit" class="btn btn-default">Uygula</button>
</form>
      </div>

     

      <footer class="footer">
         <p>&copy; 2017 Mipoaap.</p>
      </footer>

    </div> <!-- /container -->









<script src="bootstrap/js/bootstrap.min.js" ></script>
</body>
</html>





