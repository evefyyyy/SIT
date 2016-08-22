//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 900, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 900, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
})

//dropdown list

			function DropDown(el) {
				this.type = el;
				this.category = el;
				this.placeholder = this.type.children('span');
				this.opts = this.type.find('ul.dropdown > li');
				this.val = '';
				this.index = -1;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.type.on('click', function(event){
						$(this).toggleClass('active');
						return false;
					});

					obj.opts.on('click',function(){
						var opt = $(this);
						obj.val = opt.text();
						obj.index = opt.index();
						obj.placeholder.text(obj.val);
					});
				},
				getValue : function() {
					return this.val;
				},
				getIndex : function() {
					return this.index;
				}
			}
var type;
var category;

			$(function() {

				type = new DropDown( $('#type') );
				category = new DropDown( $('#category') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-3').removeClass('active');
				});

			});
function getValue() {
    var a = document.getElementById("projectNameTH").value;
    var b = document.getElementById("projectNameEN").value;
    var c = document.getElementById("type").value;
    var d = document.getElementById("category").value;
    var e = document.getElementById("Student1No").value;
    var f = document.getElementById("Student2No").value;
    var g = document.getElementById("Student3No").value;
    var h = document.getElementById("std1Name").value;
    var i = document.getElementById("std2Name").value;
    var j = document.getElementById("std3Name").value;
    var k = document.getElementById("mainAdvisor").value;
    var l = document.getElementById("coAdvisor").value;

    document.getElementById("projectNameTH1").innerHTML = a;
    document.getElementById("projectNameEN1").innerHTML = b;
    document.getElementById("type1").innerHTML = c;
    document.getElementById("category1").innerHTML = d;
    document.getElementById("Student1No1").innerHTML = e;
    document.getElementById("Student2No1").innerHTML = f;
    document.getElementById("Student3No1").innerHTML = g;
    document.getElementById("std1Name1").innerHTML = h;
    document.getElementById("std2Name1").innerHTML = i;
    document.getElementById("std3Name1").innerHTML = j;
    document.getElementById("mainAdvisor1").innerHTML = k;
    document.getElementById("coAdvisor1").innerHTML = l;
}

