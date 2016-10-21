<html>
<head>
  <title>SIT Portfolio</title>
  <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <link href="{!! URL::asset('/css/login.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! URL::asset('/css/style.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! URL::asset('css/bootstrap.css') !!}" rel="stylesheet">
  <script src="{!! URL::asset('js/jquery-2.2.4.js') !!}"></script>
  <script src="{!! URL::asset('js/bootstrap.js') !!}"></script>
  <script src="{!! URL::asset('js/login.js') !!}"></script>
  <script src="{!! URL::asset('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') !!}"></script>
  <link href="//fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
  <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:700,400' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="container">
	<div class="col-md-offset-4 col-md-4 login-container">
        <div id="output"></div>
        <img src="/img/logo.png">
        <div class="form-box">
            <form action="/login" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" placeholder="username" name="name">
                <input type="password" placeholder="password" name="password">
                <button class="btn-login" type="submit">Login</button>
            </form>
        </div>
    </div>    
</div>
</body>
</html>