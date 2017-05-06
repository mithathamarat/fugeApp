$('document').ready(function()
{ 

     /* validation */
  $("#project-table").validate({
     rules:
   {

			
	 table:
	                {
	                    required: true
	                   
	                }		
			
    },
	

	
       messages:
    {
         
           
					 
					table:{
                      required: "<span style='font-size:12px; color:#e96767;'><br><i class='fa fa-caret-right' aria-hidden='true'></i> Please enter the db name</span>"
					 
                     }
					
					 
					
  
       },
    submitHandler: loginForm 
       });  
    /* validation */
    
    /* login submit */
    function loginForm()
    {  
   var data = $("#project-table").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'model/db.model.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#submit").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> &nbsp; Folder is being created');
   },
   success :  function(response)
      {      
     if(response==1){
	
		 
     toastr["success"]("Database selected.", "Success")
	 setTimeout(' window.location.href = "tableSelect"; ',1000);
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