<!DOCTYPE html>
<html>
    <head>
        <title>SIT Portfolio</title>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('/css/style.css')}}">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700,400' rel='stylesheet' type='text/css'>
    </head>

    <body>
      <div id="wrapper">
        <div id="header">
          <nav class="navbar navbar-default navbar-fixed-top">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#"><img height="40" src="img/logo.jpg"></a>
                </div>
                 <ul class="nav navbar-nav">
                  <li><a href="#">News</a></li>
                  <li class="active"><a href="/noProject">My project</a></li>
                  <li><a href="#">My score</a></li>
                  <li><a href="#">Back to homepage</a></li>
                </ul>
                <p class="navbar-text navbar-right"><a href="#" class="navbar-link"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>RACHATAPON</a></p>     
          </nav>
        </div>
       <div id="content">
        @yield('content')
        </div>
        <div id="footer">
          <table>
            <tr>
            <th class="SITpic" rowspan="2"><img src="img/logo-SIT.gif" height="30"></th>
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
