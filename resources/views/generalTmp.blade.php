<!DOCTYPE html>
<html>
<head>
  <title>SIT Portfolio</title>
  <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <link href="{!! URL::asset('/css/style.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! URL::asset('css/bootstrap.css') !!}" rel="stylesheet">
  <script src="{!! URL::asset('js/jquery-2.2.4.js') !!}"></script>
  <script src="{!! URL::asset('js/bootstrap.js') !!}"></script>
  <script src="{!! URL::asset('js/bootstrap-confirmation.js') !!}"></script>
  <script src="{!! URL::asset('js/jquery.dotdotdot.min.js') !!}"></script>
  <script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>
  <script src="{!! URL::asset('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') !!}"></script>
  <link href="//fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
  <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:700,400' rel='stylesheet' type='text/css'>
</head>

<<<<<<< HEAD
    <body>
      <div id="wrapper">
        <div id="header">
          <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
              <div class="navbar-header">
                  <a class="navbar-brand" href="#"><img height="40" src="/img/logo.jpg"></a>
              </div>
                 <ul class="nav navbar-nav">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Category</a></li>
                </ul>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
                      <ul id="login-dp" class="dropdown-menu">
                        <li>
                           <div class="row">
                              <div class="col-md-12">
                                 <form class="form" role="form" method="post" action="/loginldp" accept-charset="UTF-8" id="login-nav">
                                 {{ csrf_field() }}
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Username" name="username" required>
                                    </div>
                                    <div class="form-group">
                                       <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="form-group">
                                       <button type="submit" class="btn-login">Login</button>
                                    </div>
                                    <div class="checkbox">
                                       <label><input type="checkbox"> keep me logged-in</label>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </li>
                      </ul>
                  </li>
                </ul> 
                </div>    
          </nav>
=======
<body>
  <div id="wrapper">
    <div id="header">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <a class="navbar-brand" href="#"><img height="40" src="/img/logo.jpg"></a>
>>>>>>> 98263b776d8eb93b9a6731d93751c33e740e8bbe
        </div>
        <ul class="nav navbar-nav">
          <li><a href="/index">Home</a></li>
        </ul>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <form class="navbar-form navbar-left" role="search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search here" aria-describedby="ddlsearch">
            <div class="ddl-select input-group-btn">
              <select id="ddlsearch" class="selectpicker form-control" data-style="btn-default">
                <option>all years</option>
                <option>2016</option>
              </select>
            </div>
            <span class="input-group-addon">
                    <span class="glyphicon glyphicon-search"></span>
            </span>
          </div>
        </form>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
              <ul id="login-dp" class="dropdown-menu">
                <li>
                 <div class="row">
                  <div class="col-md-12">
                   <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                    <div class="form-group">
                     <input type="text" class="form-control" placeholder="Username" required>
                   </div>
                   <div class="form-group">
                     <input type="password" class="form-control" placeholder="Password" required>
                   </div>
                   <div class="form-group">
                     <button type="submit" class="btn-login">Login</button>
                   </div>
                   <div class="checkbox">
                     <label><input type="checkbox"> keep me logged-in</label>
                   </div>
                 </form>
               </div>
             </div>
           </li>
         </ul>
       </li>
     </ul> 
   </div>    
 </nav>
</div>
<div id="content">
  @yield('content')
</div>
<div id="footer">
  <table>
    <tr>
      <th class="SITpic" rowspan="2"><img src="/img/logo-SIT.gif" height="30"></th>
      <td class="school">School of information technology</td>
    </tr>
    <tr>
      <td class="kmutt">King Mongkut's University of Technology Thonburi</td>
    </tr>
  </table>
</div> 
</div>
</body>
</html>
