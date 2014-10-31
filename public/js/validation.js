$(document).ready(function() { 
	$('.username-input').on("propertychange keyup input paste", function(e) {
		e.target;
		setTimeout(function() {
			var target = $(e.target);
			var str = target.val();
			console.log(str.match(/^[a-zA-Z0-9\-]+$/));
			if (!str.match(/^[a-zA-Z0-9\-]+$/)) {
				target.parent().addClass("has-error")
			} else {
				target.parent().removeClass('has-error')
			}
			if (str == ''){
				target.parent().removeClass('has-error')
			}
		}, 1);
	});
});