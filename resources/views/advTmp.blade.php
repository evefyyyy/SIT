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
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">news</a>
                    <ul class="dropdown-menu">
                      <li><a href="/news/announcement">Announcement</a></li>
                      <li><a href="/news/document">documents</a></li>
                    </ul>
                  </li>
                  <li class="{{ strrpos(Request::path(),'advproject') === 0 ? 'active' : ''  }}"><a href="/advproject">My project</a></li>
                  <li class="{{ strrpos(Request::path(),'exam/givemark') === 0 ? 'active' : ''  }}"><a href="/exam/givemarks">exam</a></li>
                  <li><a href="/index">Back to homepage</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <p class="navbar-text navbar-right"><img height="18" src="/img/user.png"> <span class="firstname">{{Auth::user()->student->student_name}}</span><span class="lol">|</span><a href="/logout" class="navbar-link logout">Logout</a></p>
              </ul>
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