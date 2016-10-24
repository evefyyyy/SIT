//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(document).ready(function() {
	$(window).keydown(function(event){
		if(event.keyCode == 13) {
			event.preventDefault();
			return false;
		}
	});
});

$(function(){
	$('#check1').on("click", function(e) {
		if($('#projectNameEN').val() == ""){
			$('#projectNameEN').addClass( "required" );
		}else{
			$('#projectNameEN').removeClass( "required" );
		}
		if($('#projectNameTH').val() == ""){
			$('#projectNameTH').addClass( "required" );
		}else{
			$('#projectNameTH').removeClass( "required" );
		}
		if($('#type span').html() == "Select"){
			$('#type').addClass( "required" );
		}else{
			$('#type').removeClass( "required" );
		}
		if($('#category span').html() == "Select"){
			$('#category').addClass( "required" );
		}else{
			$('#category').removeClass( "required" );
		}
		if($('#projectNameEN').val() != "" &&  $('#projectNameTH').val() != "" && $('#type span').html() != "Select" && $('#category span').html() != "Select"){
			$('#check1').click(gonext($(this)));
		}

	});
});

$(function(){
	$('#check2').on("click", function(e) {
		if ($("#fname2 font").html() == "Data not found" || $("#fname2 font").html() == "This student already has group" || $("#std1Name").html() == $("#fname2").html()){
			$('#stdId2').addClass( "required" );
		}else{
			$('#stdId2').removeClass( "required" );
		}
		if ($("#fname3 font").html() == "Data not found" || $("#fname3 font").html() == "This student already has group" || $("#std1Name").html() == $("#fname3").html()){
			$('#stdId3').addClass( "required" );
		}else{
			$('#stdId3').removeClass( "required" );
		}
		if ($("#fname2 font").html() != "Data not found" && $("#fname2 font").html() != "This student already has group" && $("#fname3 font").html() != "Data not found" && $("#fname3 font").html() != "This student already has group"
			&& $("#std1Name").html() != $("#fname2").html() && $("#std1Name").html() != $("#fname3").html()){
			$('#check2').click(gonext($(this)));
		}
	});
});

$(function(){
	$('#check3').on("click", function(e) {
		if ($("#mainAdvisor option:selected").val() == null){
			$('#mainAdvisor').parent().addClass( "required" );
		} else if ($("#mainAdvisor option:selected").val() == $("#coAdvisor option:selected").val()){
			$('#mainAdvisor').parent().addClass( "required" );
			$('#coAdvisor').parent().addClass( "required" );
		} else {
			$('#mainAdvisor').parent().removeClass( "required" );
			$('#coAdvisor').parent().removeClass( "required" );
			$('#check3').click(gonext($(this)));
		}
	});
});
$(function(){
	var propfile = $("input[type=file]");
	$('button[type="submit"]').click(function() {
		if (propfile.val() == "") {
			$('.file-upload-input').addClass( "required" );
  				event.preventDefault();
        		return false;
  		} else {
  			console.log('fail');
			$('.file-upload-input').removeClass( "required" );
            $('#msform').submit();
        }
    });
});

function gonext(_this){
	if(animating) return false;
	animating = true;

	current_fs = _this.parent();
	next_fs = _this.parent().next();

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
}

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

$(function() {

	var type = new DropDown( $('#type') );
	var category = new DropDown( $('#category') );

	$('#type').on('click',function(){
		if ($('#type').hasClass('active')) {
			$('#category').removeClass('active');
		} else {
		}
	});


	$('#category').on('click',function(){
		if ($('#category').hasClass('active')) {
			$('#type').removeClass('active');
		} else {
		}
	});
});

function getValue() {
	$("#projectNameEN1").html($("#projectNameEN").val());
	$("#projectNameTH1").html($("#projectNameTH").val());
	$("#type1").html($("#type span").html());
	$("#category1").html($("#category span").html());
	$("#Student1No1").html($("#Student1No").val());
	$("#Student2No1").html($("#stdId2").val());
	$("#Student3No1").html($("#stdId3").val());
	$("#std1Name1").html($("#std1Name").html());
	$("#std2Name1").html($("#fname2").html());
	$("#std3Name1").html($("#fname3").html());
	$("#mainAdvisor1").html($("#mainAdvisor").val());
	$("#coAdvisor1").html($("#coAdvisor").val());
}
$(function () {
	$('.selectpicker').selectpicker({
		liveSearch: true,

		noneSelectedText: 'no advisor selected',
	});
});
$(function () {
	$('.selectpicker1').selectpicker({
		liveSearch: true,

		noneSelectedText: 'no advisor selected',
	});
});

$(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
    	e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
//Reference:
//http://www.onextrapixel.com/2012/12/10/how-to-create-a-custom-file-input-with-jquery-css3-and-php/
;(function($) {

		  // Browser supports HTML5 multiple file?
		  var multipleSupport = typeof $('<input/>')[0].multiple !== 'undefined',
		  isIE = /msie/i.test( navigator.userAgent );

		  $.fn.customFile = function() {

		  	return this.each(function() {

		      var $file = $(this).addClass('custom-file-upload-hidden'), // the original file input
		      $wrap = $('<div class="file-upload-wrapper">'),
		      $input = $('<input type="text" class="file-upload-input" />'),
		          // Button that will be used in non-IE browsers
		          $button = $('<button type="button" class="file-upload-button">Select a File</button>'),
		          // Hack for IE
		          $label = $('<label class="file-upload-button" for="'+ $file[0].id +'">Select a File</label>');

		      // Hide by shifting to the left so we
		      // can still trigger events
		      $file.css({
		      	position: 'absolute',
		      	left: '-9999px'
		      });

		      $wrap.insertAfter( $file )
		      .append( $file, $input, ( isIE ? $label : $button ) );

		      // Prevent focus
		      $file.attr('tabIndex', -1);
		      $button.attr('tabIndex', -1);

		      $button.click(function () {
		        $file.focus().click(); // Open dialog
		    });

		      $file.change(function() {

		      	var files = [], fileArr, filename;

		        // If multiple is supported then extract
		        // all filenames from the file array
		        if ( multipleSupport ) {
		        	fileArr = $file[0].files;
		        	for ( var i = 0, len = fileArr.length; i < len; i++ ) {
		        		files.push( fileArr[i].name );
		        	}
		        	filename = files.join(', ');

		        // If not supported then just take the value
		        // and remove the path to just show the filename
		    } else {
		    	filename = $file.val().split('\\').pop();
		    }

		        $input.val( filename ) // Set the value
		          .attr('title', filename) // Show filename in title tootlip
		          .focus(); // Regain focus

		      });

		      $input.on({
		      	blur: function() { $file.trigger('blur'); },
		      	keydown: function( e ) {
		          if ( e.which === 13 ) { // Enter
		          	if ( !isIE ) { $file.trigger('click'); }
		          } else if ( e.which === 8 || e.which === 46 ) { // Backspace & Del
		            // On some browsers the value is read-only
		            // with this trick we remove the old input and add
		            // a clean clone with all the original events attached
		            $file.replaceWith( $file = $file.clone( true ) );
		            $file.trigger('change');
		            $input.val('');
		          } else if ( e.which === 9 ){ // TAB
		          	return;
		          } else { // All other keys
		          	return false;
		          }
		      }
		  });

		  });

};

		  // Old browser fallback
		  if ( !multipleSupport ) {
		  	$( document ).on('change', 'input.customfile', function() {

		  		var $this = $(this),
		          // Create a unique ID so we
		          // can attach the label to the input
		          uniqId = 'customfile_'+ (new Date()).getTime(),
		          $wrap = $this.parent(),

		          // Filter empty input
		          $inputs = $wrap.siblings().find('.file-upload-input')
		          .filter(function(){ return !this.value }),

		          $file = $('<input type="file" id="'+ uniqId +'" name="'+ $this.attr('name') +'"/>');

		      // 1ms timeout so it runs after all other events
		      // that modify the value have triggered
		      setTimeout(function() {
		        // Add a new input
		        if ( $this.val() ) {
		          // Check for empty fields to prevent
		          // creating new inputs when changing files
		          if ( !$inputs.length ) {
		          	$wrap.after( $file );
		          	$file.customFile();
		          }
		        // Remove and reorganize inputs
		    } else {
		    	$inputs.parent().remove();
		          // Move the input so it's always last on the list
		          $wrap.appendTo( $wrap.parent() );
		          $wrap.find('input').focus();
		      }
		  }, 1);

		  });
}

}(jQuery));

$('input[type=file]').customFile();

function selectType(x){
						document.getElementById("selectType").value = x;
					}

					function selectCat(x){
						document.getElementById("selectCat").value = x;
					}

					function selectAdv1(x){
						document.getElementById("selectAdv1").value = x;
					}

			    function check_name2(){
		         $.ajax({
		                type:"post",
		                dataType: "",
		                url :"stdId2",
		                data: {stdId2: $("#stdId2").val() , _token:$("#_token").val() },
		                    success:function(data){
		                      if(data=='0'){
														var _msg = null;
														var result = null;
														if(document.getElementById('stdId2').value === ''){
															result =''
														}else{
															_msg = "Data not found";
															result = _msg.fontcolor("red");
														}
		                        $('#fname2').html(result);
		                      }else if(data=='1'){
															var _msg = null;
															var result = null;
															if(document.getElementById('stdId2').value === ''){
																result =''
															}else{
																_msg = "This student already has group";
																result = _msg.fontcolor("red");
															}
			                        $('#fname2').html(result);
														}else{
															var _data = data.student_name
															$('#fname2').html(_data);
		                      	}
		                }
		             });
		    }

				function check_name3(){
					 $.ajax({
									type:"post",
									dataType: "",
									url :"stdId3",
									data: {stdId3: $("#stdId3").val() , _token:$("#_token").val() },
											success:function(data){
												if(data=='0'){
													var _msg = null;
													var result = null;
													if(document.getElementById('stdId3').value === ''){
														result =''
													}else{
														_msg = "Data not found";
														result = _msg.fontcolor("red");
													}
													$('#fname3').html(result);
												}else if(data=='1'){
														var _msg = null;
														var result = null;
														if(document.getElementById('stdId3').value === ''){
															result =''
														}else{
															_msg = "This student already has group";
															result = _msg.fontcolor("red");
														}
														$('#fname3').html(result);
													}else{
														var _data = data.student_name
														$('#fname3').html(_data);
													}
									}
							 });
			}
