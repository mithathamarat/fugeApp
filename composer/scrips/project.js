$('document').ready(function()
{ 

     /* validation */
  $("#project-name").validate({
     rules:
   {

			
	 project:
	                {
	                    required: true
	                   
	                }		
			
    },
	

	
       messages:
    {
         
           
					 
					project:{
                      required: "<span style='font-size:12px; color:#e96767;'><br><i class='fa fa-caret-right' aria-hidden='true'></i> Please enter the project name</span>"
					 
                     }
					
					 
					
  
       },
    submitHandler: loginForm 
       });  
    /* validation */
    
    /* login submit */
    function loginForm()
    {  
   var data = $("#project-name").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'model/name.model.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#submit").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> &nbsp; Folder is being created');
   },
   success :  function(response)
      {      
     if(response==1){
	
		 
     toastr["success"]("The project was successfully created.", "Success")
	 setTimeout(' window.location.href = "dbSelect"; ',1000);
    $("#submit").html('Create');
      
     }
     else{
		 
		toastr["error"](response, "Error!") 
		 $("#submit").html('Create');
 
		 
     }
     }
   });
    return false;
  }
   
 






	
});