$('document').ready(function()
{ 

     /* validation */
  $("#insupdel-form").validate({
     rules:
   {

			
	 field:
	                {
	                    required: true
	                   
	                }		
			
    },
	

	
       messages:
    {
         
           
					 
					field:{
                      required: "<span style='font-size:12px; color:#e96767;'><br><i class='fa fa-caret-right' aria-hidden='true'></i> Please select table</span>"
					 
                     }
					
					 
					
  
       },
    submitHandler: loginForm 
       });  
    /* validation */
    
    /* login submit */
    function loginForm()
    {  
   var data = $("#insupdel-form").serialize();
    
   $.ajax({
    
   type : 'POST',
   url  : 'model/insupdel.model.php',
   data : data,
   beforeSend: function()
   { 
    $("#error").fadeOut();
    $("#submit").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> &nbsp; Files  created');
   },
   success :  function(response)
      {      
     if(response){
	 toastr["success"]("Files successfully created.", "Success")
	 
	 $("#info").append(response);
	
    $("#submit").html('Create');
	
	$("#folder").show();
	$("#code").show();
	
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