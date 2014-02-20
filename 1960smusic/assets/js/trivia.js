$(function()
{
	if($('#trivia-question'))
		trivia(0);
});
function trivia(a)
{
	$('.trivia button').attr('disabled',true);
	$.get(
		'/site/trivia/'+a,
		{},
		function(data)
		{
			console.log(data);
			$('#trivia-question').html(data.question);
			$('#trivia-1').html(data.answers[0]);
			$('#trivia-2').html(data.answers[1]);
			$('#trivia-3').html(data.answers[2]);
			
			if(a == 0) 
			{
				$('#trivia-score').html(data.score);
				$('.trivia button').attr('disabled',false);
				return;
			}

			//show point change
			if(data.correct)
				$('#trivia-score-change').css('color','green').html('+10 points').fadeIn(400);
			else
				$('#trivia-score-change').css('color','red').html('-5 points').fadeIn(400);
			
			setTimeout(function(){$('#trivia-score').html(data.score);},300);

			setTimeout(function(){$('#trivia-score-change').fadeOut(400);},800);
			setTimeout(function(){$('.trivia button').attr('disabled',false);},1200);
		},
		'json'
	);
}