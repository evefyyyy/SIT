<!DOCTYPE html>
<html>
<head>
	<title>D-Day</title>
	<link href="{!! URL::asset('css/dday.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! URL::asset('css/bootstrap.css') !!}" rel="stylesheet">
</head>
<body>
<div class="container">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="row text-center">                
            <h2>D-Day</h2>
            <h4>Popular vote</h4>
        </div>
        
        <div class="panel panel-default" >
            <div class="panel-body" >
                   
                        <input type="text" class="form-control" name="gencode" id="entergencode" placeholder="enter your code">                                                                                                       

                    <div class="form-group text-center">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" href="#" class="btn btn-dday" onclick="checkGencode()">next</button>                          
                        </div>
                    </div>  
            </div>                     
        </div>  
    </div>
</div>
<div id="particles"></div>
<script src="{!! URL::asset('js/dday.js') !!}"></script>
<script type="text/javascript">
	function checkGencode(){
		var gencode = document.getElementById("entergencode").value;
		window.location="dday/voteproject/"+gencode;
	}
</script>
</body>
</html>
	
