<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fuge App | Composer</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" >
<link href="http://getbootstrap.com/examples/jumbotron-narrow/jumbotron-narrow.css" rel="stylesheet">
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="scrips/toastr/toastr.css">
<link rel="icon" type="image/png" href="favicon.png" />
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
</head>

<body>

<div class="container">
      <div class="header clearfix">
       
        <h3 class="text-muted"><i class="fa fa-cube" aria-hidden="true"></i> Fuge Composer</h3>
      </div>

      <div class="upform">
      <span id="error"></span>
   <form  id="project-name">
  <div class="form-group">
    
    <input type="text" class="form-control"  name="project" placeholder="Project Name">
  </div>
  
  <button type="submit" class="btn btn-default" id="submit" name="btn-name">Create</button>
</form>
      </div>

     

      <footer class="footer">
         <p>&copy; 2017 Fuge App.</p>
      </footer>

    </div> <!-- /container -->




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="scrips/toastr/toastr.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js" ></script>
<script src="scrips/project.js"></script>
<script src="scrips/validation.min.js"></script>

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





