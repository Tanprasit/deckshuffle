$(document).ready(function() {
$('.modal-dialog').css('width', '370px');
$('textarea').autosize();
$('textarea').on('keydown', function(e) {
	if(e.keyCode == '13'){
		e.preventDefault();
        var comment = $('#comment-form').serialize();
        $('textarea').val('');
        $.post('/comment', comment).done(function(data){ 
        	location.reload();
		});
    }
});
$('#star1').hover(
	function() {
		$(this).addClass("glyphicon-star");
		$(this).prevAll().addClass("glyphicon-star");
		$(this).removeClass("glyphicon-star-empty");
		$(this).prevAll().removeClass("glyphicon-star-empty");
		$(this).nextAll().addClass("glyphicon-star-empty");
		$('#rating').attr('value',1);
	}
);
$('#star2').hover(
	function() {
		$(this).addClass("glyphicon-star");
		$(this).prevAll().addClass("glyphicon-star");
		$(this).removeClass("glyphicon-star-empty");
		$(this).prevAll().removeClass("glyphicon-star-empty");
		$(this).nextAll().addClass("glyphicon-star-empty");
		$('#rating').attr('value',2);
	}
);
$('#star3').hover(
	function() {
		$(this).addClass("glyphicon-star");
		$(this).prevAll().addClass("glyphicon-star");
		$(this).removeClass("glyphicon-star-empty");
		$(this).prevAll().removeClass("glyphicon-star-empty");
		$(this).nextAll().addClass("glyphicon-star-empty");
		$('#rating').attr('value',3);
	}
);
$('#star4').hover(
	function() {
		$(this).addClass("glyphicon-star");
		$(this).prevAll().addClass("glyphicon-star");
		$(this).removeClass("glyphicon-star-empty");
		$(this).prevAll().removeClass("glyphicon-star-empty");
		$(this).nextAll().addClass("glyphicon-star-empty");
		$('#rating').attr('value',4);
	}
);
$('#star5').hover(
	function() {
		$(this).addClass("glyphicon-star");
		$(this).prevAll().addClass("glyphicon-star");
		$(this).removeClass("glyphicon-star-empty");
		$(this).prevAll().removeClass("glyphicon-star-empty");
		$('#rating').attr('value',5);
	}
);
$('#star5').click(
	function() {
		$(this).addClass("glyphicon-star");
		$(this).prevAll().addClass("glyphicon-star");
		$(this).removeClass("glyphicon-star-empty");
		$(this).prevAll().removeClass("glyphicon-star-empty");
	}
);
});