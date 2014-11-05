$(function() {
	var req = null;
	var oldSearch = '';
	$('#search-bar').on("keyup", function(e) {
		if ($(!'.dropdown-menu').children()) {
			$('.dropdown-menu').hide()
		};
		var str = $(e.target);
		var searchValue = $('form').serialize();
		var $this = $(this);	// thing that emmited the event
		var newSearch = $this.val();
		if (newSearch != oldSearch) {
			$('.dropdown-menu').empty();
			oldSearch = newSearch;
			if ($this.val() != '') {
				// abort previous request
				if (req != null) {
					req.abort()
				};
				req = $.get('/mini-search', searchValue).done(function( data ) {
					for (var i = 0; i < data.length; i++) {
						if (i == 0) {
							$('.dropdown-menu').append('<li role="presentation" class="dropdown-header">Card suggestions for ' + newSearch + '</li>');
							$('.dropdown-menu').append('<li role="presentation" class="divider"></li>');
						};
						var id = data[i].id;
						$('.dropdown-menu').append('<li>' + "<a href='/card/" + id + "'>" + "<img class='mini-search-img' src='" + "/images/cards/"  + id + ".jpeg'" + "'>"  +  data[i].name + "</a>" + '</li>');
						if (i+1 != data.length) {
							$('.dropdown-menu').append('<li role="presentation" class="divider"></li>');
						};
					}
					if (data.length == 0) {
						$('.dropdown-menu').hide();
					} else {
						$('.dropdown-menu').show();
					}
				});
			}
			if ($this.val() == '') {
				$('.dropdown-menu').hide();
			};
		}
	});
});
