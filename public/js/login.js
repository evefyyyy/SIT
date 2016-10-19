$(function(){
var username = $("input[type=text]");
var password = $("input[type=password]");
            $('button[type="submit"]').click(function(e) {
                e.preventDefault();
                if (username.val() == "") {
                    $("#output").removeClass(' alert alert-success');
                    $("#output").addClass("alert alert-danger animated fadeInUp").html("enter username ");
                } else if (password.val() == ""){
                    $("#output").removeClass(' alert alert-success');
                    $("#output").addClass("alert alert-danger animated fadeInUp").html("enter password ");
                } else {
                    // $("#output").removeClass(' alert alert-success');
                    // $("#output").addClass("alert alert-danger animated fadeInUp").html("invalid username or password ");
                }
            });
});
