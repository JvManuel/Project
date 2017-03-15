
$(document).ready(function(){
	$('#btn_login').click(function(){
		var uname = $('#uname').val();
		var pword = $('#pword').val();

		if(uname!=""&&pword!="")
		{
		  $.ajax({
		    url  : '/Project/Log_in/Log_in_function',
		    type : 'POST',
		    data : {
		    	'uname' : uname,
		    	'pword'	: pword
		    },
		    beforeSend : function(xhr){
		      	
		    },
		    success : function(data){
		    	  
		    	  if(data!='Wrong username or password ! Please try again !')
		    	  {
		    	  	  
			            window.location.href=data;			          

		    	  }
		    	  else
		    	  {	  
		    	  	   alert(data);
		    	  }
		    }
		  })
		}
		else
		{
					alert("Please fill up the fields !");
		}
		
	});
});