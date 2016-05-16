(function ($, root, undefined) {
	
	$(function () {
		
		var twitterShare = document.querySelector('[data-js="twitter-share"]');

		twitterShare.onclick = function(e) {
		  e.preventDefault();
		  var twitterWindow = window.open('https://twitter.com/share?url=' + document.URL, 'twitter-popup', 'height=350,width=600');
		  if(twitterWindow.focus) { twitterWindow.focus(); }
		    return false;
		  }

		var facebookShare = document.querySelector('[data-js="facebook-share"]');

		facebookShare.onclick = function(e) {
		  e.preventDefault();
		  var facebookWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + document.URL, 'facebook-popup', 'height=350,width=600');
		  if(facebookWindow.focus) { facebookWindow.focus(); }
		    return false;
		}
		

		// DOWNLOAD PDF
		var doc = new jsPDF();
		var specialElementHandlers = {
		    '#editor': function (element, renderer) {
		        return true;
		    }
		};

		// var url = window.location;
		// var langcode = url.slice(-2);
		// console.log(langcode);

		$('#download').click(function () {
			console.log('click');
		    doc.fromHTML($('#pdf').html(), 15, 15, {
		        'width': 170,
		            'elementHandlers': specialElementHandlers
		    });
		    doc.save('vegan-passport-print-'+langcode+'-letter-a4.pdf');
		});

		// Please review
		var review = $('.please-review').text();
		$('.cs-options li').attr('data-content', review);

	});
	
})(jQuery, this);
