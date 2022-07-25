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
    .section {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      height: auto;
    }
    .wrapper_1 {
      display: block;
      width: 46%;
      height: auto;
      margin-left: 4%;
      margin-right: 5%;
    } 
    .detail {
      display: block;    
      margin-top: 8%;
    }
    .detail_wrap {
      display: flex;
      margin-left: 5%; 
    }
    .detail_wrap-return {
      background-color: white;
      font-size: 1.5rem;
      border-radius: 5px;
      box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
      border: none;
      width: 120%;
      height: 90%;
      margin: 0 0 8% 0;
    }
    .detail_wrap-return, .detail_wrap-shop-name {
      display: block;    
    }
    .detail_wrap-shop-name {
      font-weight: bold;
      font-size: 1.5rem;
      margin-left: 3%;
      margin-top: 1%;
    }
    .detail_wrap-shop-img {
      width: 90%;
      height: auto;
      margin-bottom: 3%;
      margin-top: 1%;
    }
    .detail_wrap-shop-slection {
      display: flex;
      margin-left: 5%;       
    }
    .detail_wrap-shop-area, .detail_wrap-shop-category {
      font-size: 1.2rem;
      margin-bottom: 3%;  
    }
    .detail_wrap-shop-category {
      margin-left: 1%; 
    }
    .detail_wrap-shop-info {
      display: block;
      width: 90%;
      font-size: 1.2rem; 
      margin-left: 5%;
      text-align: left;  
    }
    .wrapper_2 {
      display: block;
      position: relative;
      box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
      background: linear-gradient(to bottom, #2684ff,  #6aa9fc);
      width: 40%;
      height: auto;
      border-radius: 5px 5px;
      margin-right: 4%;
      margin-top: -1%;
      padding-bottom: 15%;
    }
    .reserve_indicate {
      margin-left: 8%;
      margin-top: 5%;
      text-align: left;
    }
    .reserve_indicate-sign {
      color: white;
      font-weight: bold;
      font-size: 1.5rem;
      margin-bottom: 4%;
    }
    .reserve_indicate-calender-date, .reserve_indicate-24h-time, .reserve_indicate-users-no {
      border: none;
      margin-bottom: 4%;
      border-radius: 5px;
      height: 7%;
      font-size: 0.8rem;
    }
    .reserve_indicate-calender-date {
      width: 45%;
    }
    .reserve_indicate-24h-time, .reserve_indicate-users-no {
      width: 90%; 
    }
    .reserve_confirm {
      background-color: #6aa9fc;
      width: 70%;
      height: auto;
      border-radius: 5px 5px;
      color: white;
      font-size: 0.8rem;
      padding: 0 5%;
      line-height: 10px;
    }
    .reserve_confrim-shop, .reserve_confirm-date, .reserve_confirm-time, .reserve_confirm-number {
      display: flex; 
      padding-top: 8%;
    }
    .reserve_confirm-number-user {
      padding-bottom: 8%;
    } 
    .reserve_confirm-indication1, .reserve_confirm-indication2, .reserve_confirm-indication3 {
      margin-left: 15%;
    }
    .reserve_confirm-indication4 {
      margin-left: 5%;
      padding-left: 4%;
    }  
    .reserve_doit {
      position: absolute;
      top: 89.5%;
      left: 0;
	    background-color: #0771fa;
      border-radius: 0 0 5px 5px;
      width: 100.1%;
      box-shadow: 4px 3px 3px rgba(0, 0, 0, 0.1);
    }
    .reserve_button {
      border: none; 
      background: #2684ff;
      color: white;
      padding: 4% 10%;
      border-radius: 0 0 5px 5px;
      font-size: 1.2rem;
      width: 100%;
    }
    .error {
      display: flex;
      width:100%;
    }
    .error_exp {
      margin-right: 5%;
    }          
    @media screen and (max-width: 768px) { 
      .wrapper_1 {
        width: 80%;
        margin-left: 10%;
        margin-bottom: 10%;
      }
      .wrapper_2 {
        width: 80%;
        margin-left: 10%;
      }
      .error {
        font-size: 0.8rem;
      }
    }
</style>
@endsection

<body>
@section('header')

@endsection

@section('content')
  <section class="section">
    <div class="wrapper_1">  
      <div class="detail">
        <div class="detail_wrap"> 
          <p>
            <form action="/" name="id" method="GET">
              @csrf
              <button class="detail_wrap-return"><</button>
            </form>
          </p>
          <p class="detail_wrap-shop-name">{{$shop->shop_name}}</p>    
        </div> 
        <div>
          <p><img src="{{$shop->shop_img}}" class="detail_wrap-shop-img"></p>
        </div>
        <div class="detail_wrap-shop-slection">
      @if($shop->area_id == 1)
          <p class="detail_wrap-shop-area">#東京都</p>
      @elseif($shop->area_id == 2)  
          <p class="detail_wrap-shop-area">#大阪府</p> 
      @else($shop->area_id == 3)  
          <p class="detail_wrap-shop-area">#福岡県</p>
      @endif
      @if($shop->category_id == 1)          
          <p class="detail_wrap-shop-category">#イタリアン</p>
      @elseif($shop->category_id == 2)  
          <p class="detail_wrap-shop-category">#ラーメン</p>
      @elseif($shop->category_id == 3)  
          <p class="detail_wrap-shop-category">#居酒屋</p>
      @elseif($shop->category_id == 4)  
          <p class="detail_wrap-shop-category">#寿司</p>      
      @else($shop->category_id == 5)  
          <p class="detail_wrap-shop-category">#焼肉</p>
      @endif          
        </div>
        <div>
          <p class="detail_wrap-shop-info"> {{$shop->shop_info}} </p>      
        </div>
      </div>
    </div>
    <div class="wrapper_2">
      <div class="reserve_indicate"> 
        <div class="reserve_indicate-sign">予約</div>
        <form action="/reserve" method="POST">
          @csrf
          <div class="reserve_indicate-user">
            <input class="reserve_indicate-user-id" type="hidden" name="user_id" id="user_id" value="{{Auth::id()}}"> 
          </div>
          <div class="reserve_indicate-shop"></div>
            <input class="reserve_indicate-shop-id" type="hidden" name="shop_id" id="shop_id" value="{{$shop->id}}"> 
          <div class="reserve_indicate-calender">
            <label class="reserve_indicate-calender-lab"></label>
            <input class="reserve_indicate-calender-date" type="date" name="reserve_date" id="reserve_calender-date" value="date">
          </div>
          @error('reserve_date') 
          <div class="error">
            <p class="error_exp">エラー</p>
            <p>{{$message}}</p>
          </div>
          @enderror          
          <div class="reserve_indicate-24h">
            <label class="reserve_indicate-24h-lab"></label>
            <select class="reserve_indicate-24h-time" name="reserve_time" id="reserve_24h-time">
              <option selected value=""></option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option> 
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>                       
            </select>
          </div>
          @error('reserve_time') 
          <div class="error">
            <p class="error_exp">エラー</p>
            <p>{{$message}}</p>
          </div>
          @enderror                    
          <div class="reserve_indicate-users">
            <label class="reserve_indicate-users-lab"></label>
            <select class="reserve_indicate-users-no" name="users_number" id="reserve_users-no">
              <option selected value=""></option>
              <option value="1">1人</option>
              <option value="2">2人</option> 
              <option value="3">3人</option>
              <option value="4">4人</option>
              <option value="5">5人</option>
              <option value="6">6人</option> 
              <option value="7">7人</option>
              <option value="8">8人</option>        
              <option value="9">9人</option>
              <option value="10">10人</option>         
            </select>                  
          </div> 
          @error('users_number') 
          <div class="error">
            <p class="error_exp">エラー</p>
            <p>{{$message}}</p>
          </div>
          @enderror 
          <div class="reserve_confirm">
            <div class="reserve_confrim-shop">
              <p class="reserve_confirm-shop-name">Shop</p>
              <p class="reserve_confirm-indication1">{{$shop->shop_name}}</p>
            </div>
            <div class="reserve_confirm-date">
              <p class="reserve_confirm-date-yymmdd">Date</p>
              <p class="reserve_confirm-indication2" id="output1"></p> 
            </div>
            <div class="reserve_confirm-time">
              <p class="reserve_confirm-time-hhmm">Time</p>
              <p class="reserve_confirm-indication3" id="output2"></p>
            </div>
            <div class="reserve_confirm-number">     
              <p class="reserve_confirm-number-user">Number</p>
              <p class="reserve_confirm-indication4" id="output3"></p>
            </div>
          </div>
          <div class="reserve_doit">
            <button class="reserve_button">予約する</button>
          </div>
        </form>  
      </div>
    </div>
  </section>
@endsection
</body>
