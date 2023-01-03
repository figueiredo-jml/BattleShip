function all() 
{
	// Ajax config
	$.ajax({
        type: "GET", //we are using GET method to get all record from the server
        url: 'all.php', // get the route value
        success: function (response) {//once the request successfully process to the server side it will return result here
            
            // Parse the json result
        	response = JSON.parse(response);

            var html = "";
            // Check if there is available records
            if(response.length) {
            	html += '<div class="list-group">';
	            // Loop the parsed JSON
	            $.each(response, function(key,value) {
	            	// Our client list template
					html += '<a href="#" class="list-group-item list-group-item-action">';
					html += "<p>" + value.nome +' ' + " <span class='list-email'>(" + value.email + ")</span>" + "</p>";
					html += "<img src = /BattleShip/Images/client/" + value.avatar + ".png width='100' height='100'>";
					html += "<button class='edit btn-edit btn-sm mt-2' data-toggle='modal' data-target='#edit-client-modal' data-id='" + value.id + "'>Edit</button>";
					html += "<button class='noselect btn-sm mt-2 btn-delete-client float-right' data-id='" + value.id + "'><span class='text'>Delete</span><span class='icon'><svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24'><path d='M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z'/></svg></span></button>"
					html += '</a>';
	            });
	            html += '</div>';
            } else {
            	html += '<div class="alert alert-warning">';
				  html += 'No records found!';
				html += '</div>';
            }

            

            // Insert the HTML Template and display all client records
			$("#clients-list").html(html);
        }
    });
}

function save() 
{
	$("#btnSubmit").on("click", function() {
		var $this 		    = $(this); //submit button selector using ID
        var $caption        = $this.html();// We store the html content of the submit button
        var form 			= "#form"; //defined the #form ID
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

	            // Reload lists of clients
	            all();

	            // We will display the result using alert
	            alert(response);

	            // Reset form
	            resetForm(form);
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


function get() 
{
	$(document).delegate("[data-target='#edit-client-modal']", "click", function() {

		var Id = $(this).attr('data-id');

		// Ajax config
		$.ajax({
	        type: "GET", //we are using GET method to get data from server side
	        url: 'get.php', // get the route value
	        data: {id:Id}, //set data
	        beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click
	            
	        },
	        success: function (response) {//once the request successfully process to the server side it will return result here
	            response = JSON.parse(response);
	            $("#edit-form [name=\"id\"]").val(response.id);
	            $("#edit-form [name=\"nome\"]").val(response.nome);
	            $("#edit-form [name=\"email\"]").val(response.email);
	            $("#edit-form [name=\"pass\"]").val(response.pass);
	            $("#edit-form [name=\"avatar\"]").val(response.avatar);
				$("#edit-form [name=\"funcao\"]").val(response.funcao);
	        }
	    });
	});
}

function update() 
{
	$("#btnUpdateSubmit").on("click", function() {
		var $this 		    = $(this); //submit button selector using ID
        var $caption        = $this.html();// We store the html content of the submit button
        var form 			= "#edit-form"; //defined the #form ID
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

	            // Reload lists of clients
	            all();

	            // We will display the result using alert
	            alert(response);

	            // Reset form
	            resetForm(form);

	            // Close modal
	            $('#edit-client-modal').modal('toggle');
	        },
	        error: function (XMLHttpRequest, textStatus, errorThrown) {
	        	// You can put something here if there is an error from submitted request
	        }
	    });
	});
}

function del() 
{
	$(document).delegate(".btn-delete-client", "click", function() {

		if (confirm("Are you sure you want to delete this record?")) {
		    var Id = $(this).attr('data-id'); //get the client ID

		    // Ajax config
			$.ajax({
		        type: "GET", //we are using GET method to get data from server side
		        url: 'delete.php', // get the route value
		        data: {id:Id}, //set data
		        beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click
		            
		        },
		        success: function (response) {//once the request successfully process to the server side it will return result here
		            // Reload lists of clients
	            	all();

		            alert(response)
		        }
		    });
		}
	});
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

	// Get all client records
	all();

	// Submit form using AJAX To Save Data
	save();

	// Get the data and view to modal
	get();
	 
	// Updating the data
	update();

	// Delete the data
	del();
});

var button = document.getElementById("info");
var myDiv = document.getElementById("myDiv");

function show() {
    myDiv.style.visibility = "visible";
}

function hide() {
    myDiv.style.visibility = "hidden";
}

function toggle() {
    if (myDiv.style.visibility === "hidden") {
        show();
    } else {
        hide();
    }
}

hide();

button.addEventListener("click", toggle, false);
