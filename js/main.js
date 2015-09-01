$(function(){
var fb_id = $('input[type=hidden]').val();
	updateVoteStatus();
	function updateVoteStatus(){
		

		$.ajax({
			url: 'checkVote.php',
			method: 'post',
			data: {'fb_id': fb_id}
		}).done(function( res ) {
			if(res === 'false'){

			}else {
				$('.vote-meta').each(function(){
					$(this).addClass('disabled');
					if($(this).attr('data-id') === res){
						$(this).addClass('voted');
					}
				});
					
			}

		});
	}

	$('.vote-meta button').on('click', function(){
		
		var insta_id = $(this).attr('data-id');

		$.ajax({
			url: 'addVote.php',
			method: 'post',
			data: {'fb_id': fb_id, 'insta_id': insta_id}
		}).done(function( res ) {
			console.log(res);
		});

	});
	
});