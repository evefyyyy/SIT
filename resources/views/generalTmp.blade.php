<!DOCTYPE html>
<html>
<head>
  <title>SIT Portfolio</title>
  <?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
  ?>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{!! URL::asset('/css/style.css') !!}" rel="stylesheet" type="text/css">
  <link href="{!! URL::asset('css/bootstrap.css') !!}" rel="stylesheet">
  <link href="{!! URL::asset('css/flaticon.css') !!}" rel="stylesheet">
  <script src="{!! URL::asset('js/jquery-2.2.4.js') !!}"></script>
  <script src="{!! URL::asset('js/bootstrap.js') !!}"></script>
  <script src="{!! URL::asset('js/bootstrap-confirmation.js') !!}"></script>
  <script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>
  <script src="{!! URL::asset('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') !!}"></script>
  <link href="//fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
  <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:700,400' rel='stylesheet' type='text/css'>
  <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="manifest" href="/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
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
          <a class="navbar-brand" href="/"><img height="53" src="/img/logo.png"><img style="margin-left:5px" height="25" src="/img/blackribbon.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          @if(Auth::check())
            @if(Auth::user()->user_type_id === 1)
              <li><a href="/advisor/news/announcement">manage project</a></li>
            @elseif(Auth::user()->user_type_id === 3)
              <li><a href="/student/news/announcement">manage project</a></li>
            @elseif(Auth::user()->user_type_id === 2)
              <li><a href="/advisor/news/announcement">manage project</a></li>
            @endif
          @endif
          <li>
            <form class="navbar-form" role="search" action="{{url('home/search')}}" method="get">
          <div class="input-group search {{ strrpos(Request::path(),'index') === 0 ? 'hidden' : ''  }}">
            <input type="text" class="form-control" placeholder="What you looking for?" aria-describedby="ddlsearch" name="search" value="{{$search or ''}}">
            <div class="ddl-select input-group-btn">
              <?php
                $year = DB::table('years')->get();
                if(isset($_GET['year'])){
                  $years = $_GET['year'];
                }
               ?>
              <select id="3" class="selectpicker form-control" data-style="btn-default" name="year">

                <option value="0">all years</option>
                @foreach($year as $y)
                @if(isset($years))
                  @if($years == $y->id)
                  <option value="{{$y->id}}" selected>{{$y->year}}</option>
                  @else
                  <option value="{{$y->id}}" >{{$y->year}}</option>
                  @endif
                @else
                <option value="{{$y->id}}" >{{$y->year}}</option>
                @endif
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
            @if(Auth::user()->user_type_id === 1)
              <p class="navbar-text navbar-right"><img height="18" src="/img/user.png"> <span class="firstname">{{Auth::user()->user_advisor->advisor->advisor_name}}</span><span class="lol">|</span><a href="/logout" class="navbar-link logout">Logout</a></p>
            @elseif(Auth::user()->user_type_id === 3)
              <p class="navbar-text navbar-right"><img height="18" src="/img/user.png"> <span class="firstname">{{Auth::user()->user_student->student->student_name}}</span><span class="lol">|</span><a href="/logout" class="navbar-link logout">Logout</a></p>
            @elseif(Auth::user()->user_type_id === 2)
              <p class="navbar-text navbar-right"><img height="18" src="/img/user.png"> <span class="firstname">{{Auth::user()->user_staff->staff->name}}</span><span class="lol">|</span><a href="/logout" class="navbar-link logout">Logout</a></p>
            @endif
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
      <th class="SITpic" rowspan="2"><img src="/img/logo-sit.gif" height="30"></th>
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
      $('.firstname')[index].innerHTML = $(this).text().split(' ')[0].toLowerCase();
    });
    $('.fullname').each(function(index) {
      $('.fullname')[index].innerHTML = $(this).html().toLowerCase();
    });
</script>
</html>
