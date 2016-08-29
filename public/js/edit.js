$.fn.editable.defaults.mode = 'inline';

$(document).ready(function() {
    $('#username').editable({
        type: 'text',
        url: '/post',
        title: 'Enter username',
        ajaxOptions: {
        type: 'put'
    	}  
    });
});
//ajax emulation
$.mockjax({
    url: '/post',
    responseTime: 200,
    response: function(settings) {
        console.log(settings);
    }
}); 