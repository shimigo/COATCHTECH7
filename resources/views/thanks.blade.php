@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/reset.css')}}">
<style>
    body {
      position: relative;
      width: 100%;
      height: 100%;
      background-color: #F8F8FF;    
    } 
    .container {
      display: block;
      color: black;
      font-size: 12px;
      width:350px;
      height:220px;
      background-color: white;
      border-radius: 5px; 
      box-shadow: 3px 3px 5px rgba(0, 0, 0, 1);
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .content_thanks {
      font-size: 1rem;
      text-align: center;
      padding-top: 60px;
    }
    .content_to-login {
      font-size: 0.5rem;
      color:white;
      background-color:#2684ff;
      text-align: center;
      width: auto;
      display:block;
      padding-top: 1.5%;
      padding-bottom: 1.5%;
      padding-right: 3%;
      padding-left: 3%;
      margin: 10% auto;
      transition: 0.4s; 
      border-radius: 5px; 
      outline: none;
      border: none;  
    } 
    @media screen and (max-width: 768px) { 
      .container {
        width: 96%;
        height: auto;
        display: block;
        justify-content: start;
        font-size: 0.8rem;  
      }
    }     
</style>
@endsection

<body>
@section('header')

@endsection

@section('content')
  <div class="container">
    <form action="/login" method="GET">
      @csrf
      <div class="content">
        <p class="content_thanks">会員登録ありがとうございます</p>
        <input type="submit" class="content_to-login" value="ログインする">
      </div>
    </form>
  </div>
@endsection
</body>
