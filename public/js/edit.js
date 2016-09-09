function goBack() {
  window.history.back()
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log('group-member')
        reader.onload = function (e) {
           if(input.id === 'imgInp'){
               $('#group-member').attr('src', e.target.result);
           }else if(input.id === 'img-cover'){
              $('#cover').attr('src', e.target.result);
          }
      }

      reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function(){
    readURL(this);
});

$("#img-cover").change(function(){
    readURL(this);
});