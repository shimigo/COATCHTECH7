@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/reset.css')}}">
<style>
    body {
      width: 100%;
      height: 100%;
      background-color: #F8F8FF;      
    }
    .container {
      display: block;
      color: gray;
      font-size: 0.8rem;
      width:350px;
      height:auto;
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
    .img_spc1-img1, .img_spc2-img2, .img_spc3-img3 {
      width:5%;
      height: 5%;
      margin-right: 2%;
    }
    .button_register {
      margin-top: 2%;
      margin-left: 80%;
      color:white;
      background-color: #2684ff;
      border-radius: 2px;
      border: none;
    }
    .img_spc1-line--white, .img_spc2-line--white, .img_spc3-line--white, .password_conf-line--white {
      width: 100%;
      outline: none;
      border: none;
      background: white; 
    }
    .img_spc2, .img_spc3 {
      margin-left: 5%; 
      display: flex;  
      margin-bottom: 4%; 
      margin-top: 3%;    
    } 
    .img_spc1 {
      margin-left: 5%; 
      display: flex;  
      margin-bottom: 4%; 
      margin-top: 2%;      
    }  
    .img_spc1-line, .img_spc2-line, .img_spc3-line, .password_conf-line {  
      border-bottom: 1px solid black;
      width: 90%;
    }
    .password_conf {
      margin-top: 1%;
      text-align: left;
      margin-left: 12%;
      width: 95%;
      margin-bottom: 4%;
    }
    .error {
      display: flex;
      width:100%;
      margin-left: 5%;
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
      .button {
        width: 100%;
        padding: 1% 2%;
      }
    }         
</style>
@endsection

<body>
@section('header')

@endsection

@section('content')  
<x-guest-layout class="section">
  <div class="card">
    <div class="container">
      <div class='icon_name'>Registeration</div>
      <x-auth-card>
        <x-slot name="logo"></x-slot> 
        <form method="POST" action="{{ route('register') }}" novalidate>
          @csrf            
          <div class="img_spc1">
            <img class="img_spc1-img1" src="{{ asset('img/man.png')}}" alt=''>                
            <div class="img_spc1-line">
              <x-label for="name"/>
              <x-input id="name" placeholder="Username" class="block mt-1 w-full img_spc1-line--white" type="text" name="name" :value="old('username')" required autofocus/>
            </div>
          </div>
          @error('name') 
          <div class="error">
            <p class="error_exp">エラー</p>
            <p>{{$message}}</p>
          </div>
          @enderror              
          <div class="mt-4 img_spc2">
            <img class="img_spc2-img2" src="{{ asset('img/mail.png')}}" alt=''>      
            <div class="img_spc2-line">
              <x-label for="email"/> 
              <x-input id="email" placeholder="Email" class="block mt-1 w-full img_spc2-line--white" type="email" name="email" :value="old('email')" required/>
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
                required autocomplete="new-password" />
            </div>
          </div>
          @error('password') 
          <div class="error">
            <p class="error_exp">エラー</p>
            <p>{{$message}}</p>
          </div>
          @enderror       
          <div class="password_conf">     
            <div class="password_conf-line">
              <input name="password_confirmation" class="password_conf-line--white" placeholder="Confirm Password" type="password"/>  
            </div>
          </div>
          @error('confirm') 
          <div class="error">
            <p class="error_exp">エラー</p>
            <p>{{$message}}</p>
          </div>
          @enderror                                             
          <div class="button">
            <x-button class="button_register ml-4">{{ __('登録') }}</x-button>
          </div>
        </form>
      </x-auth-card>
    </div>
  </div>
</x-guest-layout>
@endsection
</body>
