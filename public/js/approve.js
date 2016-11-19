$(function() {
	var count = $('#pendingTable').find('tbody tr').length;
        $('#rowCount').html(count);
 });

jQuery(document).ready(function($){
	//open popup
	$('.cd-popup-trigger').on('click', function(event){
		event.preventDefault();
		$('.cd-popup').addClass('is-visible');
	});

	//close popup
	$('.cd-popup').on('click', function(event){
		if( $(event.target).is('.cd-close') || $(event.target).is('.cd-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.cd-popup').removeClass('is-visible');
	    }
    });
});

/* ============================================================
 * bootstrap-portfilter.js for Bootstrap v2.3.1
 * https://github.com/geedmo/portfilter
 * ============================================================*/
! function(d) {
    var c = "portfilter";
    var b = function(e) {
        this.$element = d(e);
        this.stuff = d("[data-tag]");
        this.target = this.$element.data("target") || ""
    };
    b.prototype.filter = function(g) {
        var e = [],
            f = this.target;
        this.stuff.fadeOut("fast").promise().done(function() {
            d(this).each(function() {
                if (d(this).data("tag") == f || f == "all") {
                    e.push(this)
                }
            });
            d(e).show()
        })
    };
    var a = d.fn[c];
    d.fn[c] = function(e) {
        return this.each(function() {
            var g = d(this),
                f = g.data(c);
            if (!f) {
                g.data(c, (f = new b(this)))
            }
            if (e == "filter") {
                f.filter()
            }
        })
    };
    d.fn[c].defaults = {};
    d.fn[c].Constructor = b;
    d.fn[c].noConflict = function() {
        d.fn[c] = a;
        return this
    };
    d(document).on("click.portfilter.data-api", "[data-toggle^=portfilter]", function(f) {
        d(this).portfilter("filter")
    })
}(window.jQuery);