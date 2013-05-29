(function($){
	var drag = function (element, settings) {
		var options = $.extend({}, drag.defaults, settings);
		var _move = false;
		var _x, _y, _docWidth, _docHeight, _thisWidth, _thisHeight;
		var _handler = options.handler;
		
	    $(_handler).click(function(){}).mousedown(function(e){
	        _move=true;
	        _docWidth = $(document).width();
	        _docHeight = $(document).height();
	        _thisWidth = $(element).width();
	        _thisHeight = $(element).height();
	        _x = e.pageX - parseInt($(element).css("left"));
	        _y = e.pageY - parseInt($(element).css("top"));
	    });
	    $(document).mousemove(function(e){
	        if(_move){
	            var x = e.pageX-_x;
	            var y = e.pageY-_y;
	            if (x <= 0) x = 0;
	            if (y <= 0) y = 0;
	            if (x + _thisWidth > _docWidth) x = _docWidth - _thisWidth;
	            if (y + _thisHeight > _docHeight) y = _docHeight - _thisHeight;
	            $(element).css({top:y,left:x});
	        }
	    }).mouseup(function(){
		    _move = false;
	  	});
	}
	drag.defaults = {
		handler : ''
    };
	$.fn.drag = function (settings) {
        return this.each(function () {
            new drag(this, settings);
        });
    };
})(jQuery);