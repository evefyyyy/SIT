$(document).ready(function() {
$('#editpj').keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
var coverWidth = $("#cover").get(0).naturalWidth;
var coverHeight = $("#cover").get(0).naturalHeight;


var count = $('.gallery').length;
var fileIndex = 0;
var arrayUnuseIndex = [];

function goBack() {
  window.history.back()
}
$('#editpj').submit(function (){
          if(coverWidth != 1920 || coverHeight != 1080){
            alert('Your poster must be 1920*1080 px');
            return false;
          }
});
function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        if(input.id === 'imgInp') {
          $('#group-member').attr('src', e.target.result);
        } else if(input.id === 'img-cover') {
          $('#cover').attr('src', e.target.result);

          coverWidth = $("#cover").get(0).naturalWidth;
          coverHeight = $("#cover").get(0).naturalHeight;

          if(coverWidth != 1920 || coverHeight != 1080){
            alert('Your poster must be 1920*1080 px');
            return false;
          }
        } else if (input.id == 'uploader') {
        if ( count == 10 ) {
          alert('Cannot upload more than 10 pictures');
        } else {
          $.each(input.files, function(key, file) {
            multipleURL(file, fileIndex);
            fileIndex++;
          });
        }
      }
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function multipleURL(file, fileIndex) {
  var reader = new FileReader();
  reader.onload = function (e) {
    count++;
    $('.image-view').append("<div class='col-xs-4 gallery' id='new-image-" + fileIndex + "'></div>");
    $('.gallery').last().append("<img id=image-" + count  + " />");
    $('#image-' + count).attr('src', e.target.result);
  }
  reader.readAsDataURL(file);
}

$('.image-view').on('click', '.gallery', function() {
  if ($(this).hasClass('active')) {
    $(this).removeClass('active');
  } else {
    $(this).addClass('active');
  }
});

$('.del').on('click', function(e) {
  e.preventDefault();
  var count = $("#cpic").val();
  var cn;
  var picture;
  var y;
  for(var i=0; i<count ; i++){
    picture = document.getElementById('pic'+i);
    if (picture !== null ) {
      cn = picture.className;
      if(cn.indexOf("active") != -1){
        y = picture.getElementsByTagName('img')[0];
        $.ajax({
            type:"post",
            dataType: "",
            url : "/edit/pic/delete",
            data: {id: $("#ssid"+i).val() , _token:$("#_token").val() },
        });
      }
    }
  }
  $('.gallery.active').each(function() {
    var galleryId = $(this).attr('id');
    if (galleryId.substring(0, galleryId.length-1) == "new-image-") {
      arrayUnuseIndex.push(galleryId.substr(-1));
    }
    $(this).remove();
  });
  $('#uploaderIndex').val(arrayUnuseIndex);
  count--;

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

$("#embedcode").ready(function() {
   var x = $("#embedcode").val();
  document.getElementById("vdo").src = x ;
});

$('.embed').on('click', function() {
    var x = $("#embedcode").val();
    if (x.indexOf("watch?v=")!=-1) {
    var link = "https://www.youtube.com/embed/"+x.substr(x.indexOf("watch?v=")+8, x.length-1);
    document.getElementById("vdo").src = link ;
  }else{
    alert("Your link is incorrect");
    $("#embedcode").val("");
  }

});