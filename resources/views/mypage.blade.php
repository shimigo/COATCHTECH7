@extends('layouts.default')

@section('css')
<link rel="stylesheet" href="{{ asset('/css/reset.css')}}">
<style>
    body {
      width: 100%;
      height: 100%;
    }
    .user_name {
      font-size: 1.5rem;
      font-weight: bold; 
      margin-left: 4%; 
      margin-top: 3%;
      margin-bottom: 2%;
    } 
    .section {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      height: auto;
      width: 92%;
      margin-left: 2%;
      background: #F8F8FF;
    }
    .wrapper_1 {
      width: 38%;
      height: auto;
      margin-left: 2%;
      background: #F8F8FF;
    } 
    .reserve_favo-status {
      display: block;
      text-align: left;
      font-size: 1rem;
      font-weight: bold;
    }
    .reserve_table {
      box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
      color: white;
      font-size: 0.8rem;
      margin-top: 2%;
      background-color: #2684ff;
      border-radius: 2%;
    }
    .reserve_table-icon-id {
      width: 50%;
    } 
    .reserve_table-clock-id {
      display: flex;
      padding-left: 8%;
      padding-top: 12%; 
      width: 100%;
    }     
    .reserve_table-clock-base {
      width: 6%;
      height: 6%;
      background-color: white;
      border-radius: 50%; 
    }
    .reserve_table-clock-img {
      width: 100%; 
    }
    .reserve_table-id {
      margin-left: 30%;
      font-weight: normal;
    }
    .reserve_table-change-icon {
      width: 50%;
    }
    .reserve_table-change-sign {
      display: flex;
      padding-bottom: 8%;
      width: 100%; 
    }
    .reserve_change-sign-exp {
      width: 50%; 
    }
    .reserve_cancel {
      width: 50%;
    }
    .reserve_cancel-delete-button {
      border: none;
      outline: none;
      background: transparent; 
      width: 30%;
    }
    .reserve_cancel-x-mark {
      width: 100%;
    } 
    .reserve_table-data {
      width: 30%;
      padding-bottom: 3%; 
      padding-top: 3%;
    }
    .reserve_table-item {
      padding-left: 5%; 
      width: 30%;   
    }
    .reserve_table-change {
      width: 50%; 
    }
    .reserve_table-change-button-1 {
      background-color: white;
      border-radius: 5px;
      border: solid 1px white;
    }
    .reserve_table-change-button-1, .reserve_table-change-calender-labdate, .reserve_table-change-24h-lab-time, .reserve_table-change-users-no {
      font-size: 0.8rem;
    }
    .reserve_table-data-last {
      padding-top: 3%;        
    }
    .wrapper_2 {
      display: block;
      background: #F8F8FF;
      width:52%;
      margin-left: 6%;
    } 
    .reserve_favo-shops {
      display: block;
      text-align: left;
      font-size: 1rem;
      font-weight: bold;
    } 
    .wrapper_2-1{
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
      width: 90%;  
      background: #F8F8FF;
    }
    .shop_table {
      background-color: white;
      box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
      margin-top: 1.5%;
      margin-bottom: 1.5%;
      border-radius: 5px;
      width: 45%;
    }
    .shop_table-icon-img {
      width: 100%;
      height: 100%;
    }
    .shop_table-icon-img-png {
      border-radius: 5px 5px 0 0;
      width: 100%;
    }
    .shop_table-icon-shop-name {
      font-weight: bold;
      font-size: 15px;
      border: none;
      padding-top: 8%;
      padding-bottom: 2%;
      padding-left: 5%;
    }
    .shop_table-icon-shop_area, .shop_table-icon-shop-category {
      display: inline-block;
      font-size: 10px;
      margin-bottom: 2%;
    }
    .shop_table-icon-shop_area {
      margin-left: 5%;
    }
    .shop_table-icon-button {
      display: flex;
      width: 100%;
    } 
    .shop_table-icon-button-link {
      display: block;
      width: 50%;
    }
    .shop_table-icon-button-detail {
      display: block;
      font-size: 0.5rem;
      color: white;
      background-color: #2684ff;
      border-radius: 5px;
      outline: none;
      border: none;  
      margin-left: 10%;
      margin-bottom: 10%;
      width: 60%;
      padding-top: 4%;
      padding-bottom: 4%;
      padding-left: 1%;
      padding-right: 1%;
    }       
    .shop_table-icon-button-favorite-red {
      display: block;
      width: 50%;
    }
    .shop_table-icon-button-favorite-delate {
      display: block;
      background-color: transparent;
      width: 100%;
      margin-left: 30%;
      border: none;
      position: relative;
      top: 0%;
      left: 40%;      
    }   
    .shop_table-icon-button-favorite-red-img {
      display: block;
      width:20%; 
    }   
    @media screen and (max-width: 768px) {
      .section {
        width: 95%;
        margin-left: 5%;
      }
      .wrapper_1 {
        width: 89%;
        margin-left: 1%;
      }
      .wrapper_2 {
        width: 89%;  
        margin-left: 1%;
      }
      .wrapper_2-1 {
        width: 100%;
      }
      .reserve_favo-status  {
        text-align: center;     
      }
      .reserve_favo-shops {
        text-align: center;
        margin-top: 2%;
        margin-bottom: 2%;
      }
      .shop_table {
        width: 100%; 
      }
    }
</style>
@endsection

<body>
@section('content')
  <h2 class="user_name">{{$items->name}}さん</h2> 
  <section class="section"> 
    <div class="wrapper_1">  
      <div class="reserve_favo-status">予約状況</div> 
    @foreach($reserves as $reserve)          
      <table width="100%" border="" class="reserve_table">                     
        <tr width="100%" class="reserve_table-icon">
          <td colspan="2" class="reserve_table-icon-id">
            <div class="reserve_table-clock-id">            
              <div class="reserve_table-clock-base"> 
                <img class="reserve_table-clock-img" src="{{ asset('img/clock3.png')}}" alt="">
              </div>
              <div class="reserve_table-id">予約{{$reserve->id}}</div>
            </div>  
          </td>
          <td colspan="2" class="reserve_table-change-icon">
            <div class="reserve_table-change-sign">   
              <div class="reserve_change-sign-exp">予約変更</div>
              <div class="reserve_cancel">
                <form action="/reserve/destroy/{{$reserve->id}}" method="POST" class="">
                  @csrf 
                  <button type="submit" class="reserve_cancel-delete-button">   
                    <img class="reserve_cancel-x-mark" src="{{asset('img/X1.png')}}" alt="">
                  </button>    
                </form> 
              </div>
            </div> 
          </td>                         
        </tr>
        <form action="/reserve/update/{{$reserve->id}}" method="POST">
          @csrf                         
          <tr>
            <td class="reserve_table-item">Shop</td>
            <td class="reserve_table-data">{{$reserve->shop->shop_name}}</td>
            <td class="reserve_table-change">
              <div class="reserve_table-change-button">
                <button class="reserve_table-change-button-1">予約変更する</button>
              </div>              
            </td>
          </tr>                                                 
          <tr>
            <td class="reserve_table-item">Date</td>
            <td class="reserve_table-data">{{$reserve->reserve_date}}</td>
            <td class="reserve_table-change">
                <div class="reserve_table-change-calender">
                  <label class="reserve_table-change-calender-lab"></label>
                  <input class="reserve_table-change-calender-lab-date" type="date" name="reserve_date" id="reserve_calender-date" value="date">
                </div>
            </td>
          </tr>
          @error('reserve_date') 
          <tr>
            <td></td>
            <th>エラー</th>
            <td>{{$message}}</td>
          </tr>
          @enderror                               
          <tr>
            <td class="reserve_table-item" >Time</td>
            <td class="reserve_table-data" >{{$reserve->reserve_time->format('H:i')}}</td>
            <td class="reserve_table-change">
              <div class="reserve_table-change-24h">
                <label class="reserve_table-change-24h-lab"></label>
                <select name="reserve_time" class="reserve_table-change-24h-lab-time" id="reserve_24h-time">
                  <option selected value=""></option>
                  <option value="17:00">17:00</option>
                  <option value="18:00">18:00</option> 
                  <option value="19:00">19:00</option>
                  <option value="20:00">20:00</option>                       
                </select>
              </div>
            </td>
          </tr>
          @error('reserve_time') 
          <tr>
            <td></td>
            <th>エラー</th>
            <td>{{$message}}</td>
          </tr>
          @enderror  
          <tr>                    
            <td class="reserve_table-item">Number</td>
            <td class="reserve_table-data reserve_table-data-last" >{{$reserve->users_number}}人</td>
            <td class="reserve_table-change">
              <div class="reserve_table-change-users">
                <label class="reserve_table-change-users-lab"></label>
                  <select name="users_number" class="reserve_table-change-users-no" id="reserve_users-no">
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
            </td>
          </tr>
          @error('users_number') 
          <tr>
            <td></td>
            <th>エラー</th>
            <td>{{$message}}</td>
          </tr>
          @enderror 
        </form>        
      </table>  
    @endforeach 
    </div>
    <div class="wrapper_2">
      <div class="reserve_favo-shops">お気に入り店舗</div>  
      <div class="wrapper_2-1">
    @foreach($favorites as $favorite)
      <table class="shop_table">
        <tbody class="shop_table-icon">  
          <tr class="shop_table-icon-img">
            <td><img src="{{$favorite->shop->shop_img}}" class="shop_table-icon-img-png"></td>
          </tr>
          <tr>
            <td class="shop_table-icon-shop-name">{{$favorite->shop->shop_name}}</td>
          </tr>
          <tr>
        @if($favorite->shop->area_id == 1)
            <td class="shop_table-icon-shop_area">#東京都</td>
        @elseif($favorite->shop->area_id == 2)  
            <td class="shop_table-icon-shop_area">#大阪府</td> 
        @else($favorite->shop->area_id == 3)  
            <td class="shop_table-icon-shop_area">#福岡県</td>
        @endif
        @if($favorite->shop->category_id == 1)          
            <td class="shop_table-icon-shop-category">#イタリアン</td>
        @elseif($favorite->shop->category_id == 2)  
            <td class="shop_table-icon-shop-category">#ラーメン</td>
        @elseif($favorite->shop->category_id == 3)  
            <td class="shop_table-icon-shop-category">#居酒屋</td>
        @elseif($favorite->shop->category_id == 4)  
            <td class="shop_table-icon-shop-category">#寿司</td>      
        @else($favorite->shop->category_id == 5)  
            <td class="shop_table-icon-shop-category">#焼肉</td>
        @endif          
          </tr>
          <tr class="shop_table-icon-button">
            <td class="shop_table-icon-button-link">
              <form action="/detail/{{$favorite->shop->id}}" name="id" method="GET">
                @csrf
                <button class="shop_table-icon-button-detail">詳しく見る</button>
              </form> 
            </td> 
            <td class="shop_table-icon-button-favorite-red">     
              <form action="/favorite/destroy/{{$favorite->shop->id}}" name="id" method="POST" class="">
                @csrf  
                <button type="submit" class="shop_table-icon-button-favorite-delate">              
                  <img class="shop_table-icon-button-favorite-red-img" src="{{ asset('img/heartRed.png')}}" alt=''> 
                </button>
              </form> 
            </td>
          </tr>
        </tbody>
      </table>
    @endforeach   
      </div>
    </div> 
  </section>
@endsection 
</body>

