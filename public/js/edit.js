var count = $('.gallery').length;

function goBack() {
  window.history.back()
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
           if(input.id === 'imgInp'){
               $('#group-member').attr('src', e.target.result);
           }else if(input.id === 'img-cover'){
              $('#cover').attr('src', e.target.result);
          }else if (input.id == 'uploader') {
            if ( count == 9 ) {
              alert('Cannot upload more than 9 pictures');
            } else {
              count++;
              $('.image-view').append('<div class="col-xs-4 gallery"></div>');
              $('.gallery').last().append("<img id=image-" + count  + " />")
              $('#image-' + count).attr('src', e.target.result);
              console.log(count);
            }
          }
      }
      reader.readAsDataURL(input.files[0]);
  }
}

$('.gallery').on('click', function() {
  if ($(this).hasClass('active')) {
    $(this).removeClass('active');
  } else {
    $(this).addClass('active');
  }
  
});

$('.del').on('click', function(e) {
  e.preventDefault();
  var count = $("#cpic").val();
  var cn ;
  var x ; 
  var y ;
  for(var i=0; i<count ; i++){
    x = document.getElementById('pic'+i) ;
    cn = x.className ;
    if(cn.indexOf("active") != -1){
      y = x.getElementsByTagName('img')[0]; 
      $.ajax({
          type:"post",
          dataType: "",
          url : "/edit/pic/delete",
          data: {id: $("#ssid"+i).val() , _token:$("#_token").val() },
      });
    }
  }
  $('.gallery.active').remove();

});

$("#imgInp").change(function(){
    readURL(this);
});

$("#img-cover").change(function(){
    readURL(this);
});

$("input#uploader").change(function() {
    readURL(this);
});

$('#upload').on('click', function() {
  $.ajax({
    url: '',
    dataType: 'html',
    type: 'GET',
    success: function() {

    }
  })
});