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
      color: gray;
      font-size: 0.8rem;
      width:350px;
      height:200px;
      background-color: white;
      border-radius: 5px; 
      box-shadow: 3px 3px 5px rgba(0, 0, 0, 1);
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding-bottom: 1%;
    }
    .icon_name {
      display: block;
      text-align: left;
      padding-left: 5%;
      padding-bottom: 2.5%;
      padding-top: 2.5%;
      width:95%;
      background-color: #2684ff;
      color:white;
      border-radius: 5px 5px 0 0;
    }
    .img_spc2-img2, .img_spc3-img3{
      width:5%;
      height: 5%;
      margin-right: 2%;
    }
    .img_spc2 {
      margin-left: 3%; 
      display: flex;  
      margin-bottom: 4%; 
      margin-top: 8%;    
    } 
    .img_spc3 {
      margin-left: 3%; 
      display: flex;  
      margin-bottom: 4%; 
      margin-top: 4%;    
    } 
    .img_spc2-line--white, .img_spc3-line--white {
      width: 100%;
      outline: none;
      border: none;
      background: white; 
    }
    .img_spc2-line, .img_spc3-line {
      border-bottom: 1px solid black;
      width: 90%;
    }
    .button_login {
      margin-top: 5%;
      margin-left: 70%;
      padding: 1% 2%;
      color:white;
      background-color: #2684ff;
      border-radius: 2px;
      border: none;
    } 
    .error {
      display: flex;
      width:100%;
      margin-left: 10%;
    }
    .error_exp {
      margin-right: 5%;
    }   
    @media screen and (max-width: 768px) {
      .container {
        width: 96%;
        height: auto;
        display: block;
        justify-content: start;
        font-size: 0.8rem;   
      }
      .button_login {
        font-size: 0.5rem;
        margin-left: 75%;
        margin-bottom: 2%;
      }
    }
</style>
@endsection

<body>
@section('header')

@endsection

@section('content')  
  <x-guest-layout class="card">
    <div class="container">
      <div class='icon_name'>Login</div>
      <x-auth-card>
        <x-slot name="logo"></x-slot>
        <x-auth-session-status class="mb-4" :status="session('status')"/>
          <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
            <div class="img_spc2">
              <img class="img_spc2-img2" src="{{ asset('img/mail.png')}}" alt=''>  
              <div class="img_spc2-line">                                    
                <x-label for="email"/>    
                <x-input id="email" placeholder="Email" class="block mt-1 w-full img_spc2-line--white" type="email" name="email" :value="old('email')" required autofocus/>
              </div>
            </div>
            @error('email') 
            <div class="error">
              <p class="error_exp">エラー</p>
              <p>{{$message}}</p>
            </div>
            @enderror                                                                          
            <div class="mt-4 img_spc3">
              <img class="img_spc3-img3" src="{{ asset('img/key.png')}}" alt=''>    
              <div class="img_spc3-line">
                <x-label for="password"/> 
                <x-input id="password" placeholder="Password" class="block mt-1 w-full img_spc3-line--white" 
                  type="password"
                  name="password"
                  required autocomplete="current-password" />
              </div>
            </div>
            @error('password') 
            <div class="error">
              <p class="error_exp">エラー</p>
              <p>{{$message}}</p>
            </div>
            @enderror                                                          
            <div class="flex items-center justify-end mt-4">
          @if (Route::has('password.request'))
              <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}"></a>
          @endif
            </div>
            <div class="button">
              <x-button class="button_login ml-3">{{ __('ログイン') }}</x-button>
            </div>                                
          </form>
      </x-auth-card>
    </div>
  </x-guest-layout>
@endsection
</body>
