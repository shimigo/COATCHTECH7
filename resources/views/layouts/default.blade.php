<!DOCTYPE HTML>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Gorditas&display=swap" rel="stylesheet">
</head>

@yield('css') 
<link rel="stylesheet" href="{{ asset('/css/reset.css')}}">
<link rel="stylesheet" href="css/style.css">
<style>
    body {
      width: 100%;
      height: 100%;
      text-align: center;
      background-color: #F8F8FF;      
    }
    .project_header {
      display: flex;
      margin-left: 20px;
    }
    .hamburger {
      display: block;
      background-color: #2684ff;
      width: 25px;
      height: 25px;
      padding: 10px 10px 0 0;
      border-radius: 3px;
      box-shadow: 3px 3px 5px rgba(0, 0, 0, 1);
      margin-left: 50px;
      margin-top: 30px;
      z-index: 3;
    }
    .menu {
      display:inline-block;
      width: 36px;
      height: 23px;
      position: relative;
      left: -10px;
      top: 0px;
    }
    .menu__line--top,
    .menu__line--middle,
    .menu__line--bottom {
      display: inline-block;
      height: 1px;
      background-color: white;
      position: absolute;
      transition: 0.5s;
      z-index: 10;
    }
    .menu__line--top {
      top: 0;
      width: 20%;
    }
    .menu__line--middle {
      top: 7px;
      width: 50%;
    }
    .menu__line--bottom {
      bottom: 7px;
      width: 10%;
    }
    .menu.open span:nth-of-type(1) {
      top: 7px;
      width: 50%;
      transform: rotate(45deg);
    }  
    .menu.open span:nth-of-type(2) {
      opacity: 0;
    }
    .menu.open span:nth-of-type(3) {
      top: 7px;
      width: 50%;
      transform: rotate(-45deg);
    }
    .in {
      transform: translateX(100%);
    }       
    .navkey a{
      text-decoration: none;
      color:  #2684ff;
      font-weight: bold;
      font-size: 25px;
      cursor: default;
    }
    .navkey {
      position: absolute;
      height: 250vh;
      width: 100%;
      left: -100%;
      background: #F8F8FF;
      transition: 0.7s;
      text-align: center;
      z-index: 1;
      top: 10px;
    }
    .navkey ul{
      padding-top: 80px;
    }
    .navkey ul li{
      list-style-type: none;
      margin-top: 50px;
    }
    .drawer_nav-logout {
      font-size: 25px;
      font-weight: bold;
      background: #F8F8FF;
      color: #2684ff;
      text-align: center;
      border: none;
    }
    .drawer_nav-mypage {
      font-size: 25px;
      font-weight: bold;
      background: #F8F8FF;
      color: #2684ff;
      text-align: center;
      border: none;
    }
    .drawer {
      display: inline; 
    }
    .project_name {
      color: #2684ff;
      font-weight: bold;
      font-size: 25px;
      display: block;
      padding-left: 20px;
      padding-top: 40px;
    }        
</style>

<body>
  <h1>@yield('title')</h1>
@yield('header')
  <header class="project_header">
    <div class="hamburger">
      <nav class="menu" id="menu">
        <span class="menu__line--top"></span>
        <span class="menu__line--middle"></span>
        <span class="menu__line--bottom"></span>
      </nav>
    </div>
  @if(Auth::check())
    <div class="drawer">
      <nav class="navkey" id="navkey">
        <ul>
          <li class="drawer-nav-item" ><a href="/">Home</a></li>
          <li class="drawer-nav-item">
            <form action="/logout" name="id" method="POST">
              @csrf
              <button class="drawer_nav-logout">Logout</button>
            </form>
          </li>
          <li class="drawer-nav-item">
            <form action="/mypage/{{Auth::id()}}" name="id" method="GET">
              @csrf
              <button class="drawer_nav-mypage">Mypage</button>
            </form>
          </li>                       
        </ul>
      </nav>
    </div>
           @else 
    <div>
      <nav class="navkey" id="navkey">
        <ul>
          <li class="drawer-nav-item"><a href="/">Home</a></li>
          <li class="drawer-nav-item"><a href="/register">Registration</a></li>
          <li class="drawer-nav-item"><a href="/login">Login</a></li>
        </ul>
      </nav>
    </div> 
  @endif
    <h2 class='project_name'>Rese</h2>
  </header>  

@yield('content')
  <div class="main-contents"></div>
</body>
<script src="{{ asset('js/main.js')}}"></script>
</html>