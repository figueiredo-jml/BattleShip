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
	            	// Our scoreboard template
					html += '<a href="#" class="list-group-item list-group-item-action">';
					html += "<p>" + value.nome +' ' + " <span class='list-email'>(" + value.funcao + ")</span>" + "</p>";
					html += ' Games '+'('+ value.jogos +')'+' Victories '+'('+ value.vitorias +')'+' Defeats '+'('+ value.derrotas +')';
					html += '</a>';
	            });
	            html += '</div>';
            } else {
            	html += '<div class="alert alert-warning">';
				  html += 'No records found!';
				html += '</div>';
            }

            

            // Insert the HTML Template and display all admin records
			$("#scoreboard").html(html);
        }
    });
}

$(document).ready(function() {

	// Get all admin records
	all();
	 
});
