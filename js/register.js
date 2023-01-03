function create() 
{
	$("#btnCreate").on("click", function() {
		var $this 		    = $(this); //submit button selector using ID
        var $caption        = $this.html();// We store the html content of the submit button
        var form 			= "#register-form"; //defined the #form ID
        var formData        = $(form).serializeArray(); //serialize the form into array
        var route 			= $(form).attr('action'); //get the route using attribute action

        // Ajax config
    	$.ajax({
	        type: "POST", //we are using POST method to submit the data to the server side
	        url: route, // get the route value
	        data: formData, // our serialized array data for server side
	        beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click
	            $this.attr('disabled', true).html("Processing...");
	        },
	        success: function (response) {//once the request successfully process to the server side it will return result here
	            $this.attr('disabled', false).html($caption);

	            // We will display the result using alert
	            alert(response);

	            // Reset form
	            resetForm(form);

	            // Close modal
	            $('#register-modal').modal('toggle');
	        },
	        error: function (XMLHttpRequest, textStatus, errorThrown) {
	        	// You can put something here if there is an error from submitted request
	        }
	    });
	});
}

function resetForm(selector) 
{
	$(selector)[0].reset();
}

function usernameAvailability(usernameInput){
    $.ajax({
     method:"POST",
     url: "checkdb.php",
     data:{username:usernameInput},
     success: function(data){
       $('#usernameStatus').html(data);
     }
   });
}

$(document).on('input','#username',function(e){
    let usernameInput = $('#username').val();
    let msg;
    if(usernameInput.length==0){
      msg="<span style='color:red'>Enter username</span>";
    }else if((/^$|\s+/).test(usernameInput))
    {
     msg="<span style='color:red'>username can't contain spaces</span>";
    }
    else if(usernameInput.length!=0 && (usernameInput.length <5 || usernameInput.length >20)){
      msg="<span style='color:red'>username must be between 5-20</span>";
    }else{
      usernameAvailability(usernameInput);
    }
    $('#usernameStatus').html(msg);
});

$(document).ready(function() {


	// Submit form using AJAX To Save Data
	create();

});