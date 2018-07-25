;
(function(w, $) {

	;
	(function() {

		var toastTmpl = '' + 
			'<div class="modal message">' + 
	        '<div class="message-body">' + 
	        '<div class="close-modal"></div>' + 
	        '<p class="message-content">gg' + 
	        '</p>' + 
	        '<button class="message-confirm">OK</button>' + 
	        '</div>' + 
	        '</div>';

		function toast(type, msg, callback) {

			if (type == '' || !type) {
				throw new Error('gimme type u idiot!');
			}

			$(toastTmpl).appendTo($('body')).delay(100).queue(function(){
				// console.log($(this));
				$(this).find('.message-body').addClass('open').dequeue();
			});

			if (msg.length > 0) {
				$('.message-content').html(msg);
			}

			$('.close-modal').on('click', function(){
				$('.message-body').removeClass('open').delay(200).queue(function(){
					$('.modal.message').remove().dequeue();
				});
			});


		}

		$.extend({
			'toast': {
				'confirm': function(msg, callback) {
					toast('confirm', msg, callback);
				}
			}
		});

	})();

})(window, jQuery);
