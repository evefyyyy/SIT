<!DOCTYPE html>
<html>
<head>
  <title>SIT Portfolio</title>
  <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <link href="{!! URL::asset('/css/style.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! URL::asset('css/bootstrap.css') !!}" rel="stylesheet">
  <link href="{!! URL::asset('css/flaticon.css') !!}" rel="stylesheet">
  <script src="{!! URL::asset('js/jquery-2.2.4.js') !!}"></script>
  <script src="{!! URL::asset('js/bootstrap.js') !!}"></script>
  <script src="{!! URL::asset('js/bootstrap-confirmation.js') !!}"></script>
  <script src="{!! URL::asset('js/jquery.dotdotdot.min.js') !!}"></script>
  <script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>
  <script src="{!! URL::asset('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') !!}"></script>
  <link href="//fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
  <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:700,400' rel='stylesheet' type='text/css'>
</head>


<body>
  <div id="wrapper">
    <div id="header">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
          <a class="navbar-brand" href="#"><img height="40" src="/img/logo.jpg"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="/home/projects">Home</a></li>
          @if(Auth::check())
            <li><a href="/student/news/announcement">manage project</a></li>
          @endif
          <li>
          <form class="navbar-form" role="search" action="{{url('home/projects/search')}}" method="get">
          <div class="input-group search {{ strrpos(Request::path(),'index') === 0 ? 'hidden' : ''  }}">
            <input type="text" class="form-control" placeholder="What you looking for?" aria-describedby="ddlsearch" name="search">
            <div class="ddl-select input-group-btn">
              <?php
                $year = DB::table('years')->get();
               ?>
              <select id="ddlsearch" class="selectpicker form-control" data-style="btn-default" name="year">
                <option value="0">all years</option>
                @foreach($year as $y)
                <option value="{{$y->id}}">{{$y->year}}</option>
                @endforeach
              </select>
            </div>
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" class="btn">
                    <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div>
        </form>
      </li>
      </ul>
        @if(Auth::check())
        <p class="navbar-text navbar-right"><img height="18" src="/img/user.png"> <span class="firstname">{{Auth::user()->user_student->student->student_name}}</span><span class="lol">|</span><a href="/logout" class="navbar-link logout">Logout</a></p>
        @else
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
              <ul id="login-dp" class="dropdown-menu">
                <li>
                 <div class="row">
                  <div class="col-md-12">
                   <form class="form" role="form" method="post" action="/login" accept-charset="UTF-8" id="login-nav">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                     <input type="text" class="form-control" placeholder="Username" name="name" required>
                   </div>
                   <div class="form-group">
                     <input type="password" class="form-control" placeholder="Password" name="password" required>
                   </div>
                   <div class="form-group">
                     <button type="submit" class="btn-login">Login</button>
                   </div>
                 </form>
               </div>
             </div>
           </li>
         </ul>
       </li>
    </ul>
   </div>
       @endif
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
<script>
$('.firstname').each(function(index) {
  document.getElementsByClassName('firstname')[index].innerHTML = $(this).text().split(' ')[0]
});
</script>
</html>
