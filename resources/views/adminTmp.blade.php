<!DOCTYPE html>
<html>
    <head>
        <title>SIT Portfolio</title>
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{!! URL::asset('css/style.css') !!}" rel="stylesheet" type="text/css">
        <link href="{!! URL::asset('css/bootstrap.css') !!}" rel="stylesheet">
        <link href="{!! URL::asset('css/flaticon.css') !!}" rel="stylesheet">
        <link href="{!! URL::asset('css/bootstrap-datetimepicker.css') !!}" rel="stylesheet">
        <script src="{!! URL::asset('js/jquery-2.2.4.js') !!}"></script>
        <script src="{!! URL::asset('js/bootstrap.js') !!}"></script>
        <script src="{!! URL::asset('js/moment.js') !!}"></script>
        <script src="{!! URL::asset('js/bootstrap-datetimepicker.min.js') !!}"></script>
        <script src="{!! URL::asset('js/bootstrap-confirmation.js') !!}"></script>
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
                    <a class="navbar-brand" href="#"><img height="40" src="/img/logo.jpg"></a>
                </div>
                 <ul class="nav navbar-nav">
                  <li class="dropdown {{ strrpos(Request::path(),'news') === 0 ? 'active' : ''  }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">news</a>
                    <ul class="dropdown-menu">
                      <li><a href="/news/announcement">Announcement</a></li>
                      <li><a href="/news/document">documents</a></li>
                    </ul>
                  </li>
                  <li class="dropdown {{ strrpos(Request::path(),'exam') === 0 ? 'active' : ''  }}">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">exam</a>
                    <ul class="dropdown-menu">
                      <li><a href="/exam/manageroom">exam room</a></li>
                      <li><a href="">score sheet</a></li>
                      <li><a href="">score record</a></li>
                    </ul>
                  </li>
                  <li class="{{ strrpos(Request::path(),'project') === 0 ? 'active' : ''  }}"><a href="/project">Student projects</a></li>
                  <li><a href="/index">Back to homepage</a></li>
                </ul>
                <p class="navbar-text navbar-right"><img height="18" src="/img/user.png"> Admin<span class="lol">|</span><a href="/index" class="navbar-link logout">Logout</a></p>     
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
