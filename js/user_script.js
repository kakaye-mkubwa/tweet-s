
jQuery(function($){
	$(document).ready(function()
	{
		// console.log("Restarted");
		//hide tweet Results
		// $('#tweet-results-div').hide();
		//hide submit buttons
		$('#form-submit').hide();

		// if ($('#card_name').is(':empty'))
		// {
		// 	$('#tweet-results-div').hide();
		// }

		//Swiper
		var swiper = new Swiper('.swiper-container', {
			pagination: {
				el: '.swiper-pagination',
				type: 'progressbar',
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});

		//check if swiper-slide is empty


		if( !$.trim( $('#card_text').html() ).length )
		{
			$('#tweet-results-div').hide();
		}

		//
		$('#search_input').focus(function(){
			// console.log("Tuko ndani");
			$(document).on("keypress", function(e)
			{
//				e.preventDefault();
				var searchVal = $('#search_input').val();
				if (e.which == 13)
				{
					// var search_input = $(this).data('search_input'); //get the data from search bar
					$('#search_form').submit();
					// $('#tweet-results-div').show();
					// console.log("Div shown")
				}
			});
		});
	});
})

//
// console.log(searchVal);
// $.ajax({
// 		type: "POST",
// 		url: "blue.php",
// 		data: 'search='+searchVal,
// 		dataType: 'html'
// 	}).done(function(data){
// 		data: 'search='+searchVal,
// 		console.log(data);
// 		window.location.href = 'blue.php';
//
// 	});
// 		success: function(data)
// 		{
// 			// data: 'search='+response
// 		 	console.log("Success");
// 			window.location.href = "blue.php";
// 		},
// 		error: function(xhr, textStatus, thrownError, data) {
// 		    // alert("Error: " + thrownError);
// 		    console.log(thrownError);
// 		}
