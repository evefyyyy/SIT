<!DOCTYPE html>
<html>
    <head>
        <title>SIT Portfolio</title>
        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="{!! URL::asset('css/style.css') !!}" rel="stylesheet" type="text/css">
        <link href="{!! URL::asset('css/bootstrap.css') !!}" rel="stylesheet">
        <link href="{!! URL::asset('css/flaticon.css') !!}" rel="stylesheet">
        <link href="{!! URL::asset('css/bootstrap-datetimepicker.css') !!}" rel="stylesheet">
        <link href="{!! URL::asset('css/datatables.css') !!}" rel="stylesheet">
        <script src="{!! URL::asset('js/jquery-2.2.4.js') !!}"></script>
        <script src="{!! URL::asset('js/bootstrap.js') !!}"></script>
        <script src="{!! URL::asset('js/moment.js') !!}"></script>
        <script src="{!! URL::asset('js/bootstrap-datetimepicker.min.js') !!}"></script>
        <script src="{!! URL::asset('js/bootstrap-confirmation.js') !!}"></script>
        <script src="{!! URL::asset('js/bootstrap-select.min.js') !!}"></script>
        <script src="{!! URL::asset('//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js') !!}"></script>
        <script src="{!! URL::asset('js/datatables.min.js') !!}"></script>
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
                    <a class="navbar-brand" href="#"><img height="40" src="/img/logo.png"><img style="margin-left:5px" height="25" src="/img/blackribbon.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                 <ul class="nav navbar-nav">
                  <li><a href="/home">home</a></li>
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
                      <li><a href="/exam/allowtest">allow test</a></li>
                      <li><a href="/exam/manageroom">exam room</a></li>
                      <li><a href="/exam/scoresheet">score sheet</a></li>
                      <li><a href="/exam/scorerecord">score record</a></li>
                    </ul>
                  </li>
                  <li class="{{ strrpos(Request::path(),'project') === 0 ? 'active' : ''  }}"><a href="/project">Student projects</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <p class="navbar-text navbar-right"><img height="18" src="/img/user.png"> <span class="firstname">Admin</span><span class="lol">|</span><a href="/index" class="navbar-link logout">Logout</a></p>  
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
