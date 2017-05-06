<?php
session_start();
 if(isset($_POST['btn-name']))
 {
	 
@$project=$_POST["project"];
		
$_SESSION['project'] = $project;




 if (!is_dir('../../../'.$project.'')) 

{
 echo 1;
mkdir('../../../'.$project.'');

}
else
{echo 'There is a folder with this name.Please use a different name';}	 
	 
	 }




		
?>





