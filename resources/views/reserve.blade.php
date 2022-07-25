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
      width:35%;
      height: 25%;
      background-color: white;
      border-radius: 5px; 
      box-shadow: 3px 3px 5px rgba(0, 0, 0, 1);
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .content_reserved {
      font-size: 1rem;
      text-align: center;
      padding-top: 60px;
    }
    .content_to-return {
      font-size: 0.5rem;
      color:white;
      background-color:#2684ff;
      text-align: center;
      width: 6%;
      display:block;
      padding: 1.5%;
      margin: 10% auto;
      transition: 0.4s; 
      border-radius: 5px; 
      outline: none;
      border: none;  
      text-decoration: none;
    } 
    @media screen and (max-width: 768px) {
      .container {
        width: 90%; 
        margin: 0 1%;
        height: auto;
      }
      .content_reserved {
        font-size: 1rem;  
      } 
      .content_to-return {
        width: 30px;
      }

    }     
</style>
@endsection

<body>
@section('header')

@endsection

@section('content')
  <div class="container">
    <div class="content"> 
      <p class="content_reserved">ご予約ありがとうございます</p>
      <a class="content_to-return" href ="http://127.0.0.1:8000/detail/{{$shop->shop_id}}">戻る</a>
    </div>
  </div>
@endsection
</body>
