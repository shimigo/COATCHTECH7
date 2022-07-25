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
    .section0 {
      display: block;
      width: 50%;
      height: auto;
      background-color: white;
      border-radius: 5px;
      box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
      position: absolute;
      top: 5%;
      left: 74%;
      transform: translate(-50%, -50%); 
    }
    .select_box {
      display: flex;
      width: 107%;  
    }
    select {
      -webkit-appearance: none;
      appearance: none;
      height: auto;  
    }
    select::-ms-expand {
      -webkit-appearance: none;
      appearance: none;
    }
    select {
      -webkit-appearance: none;
      appearance: none;
      background-image: url({{ asset('img/triangle.png')}});
      background-size: 10% 30%;
      background-repeat: no-repeat;
      background-position: center right 4px;
    }
    select::-ms-expand {
      -webkit-appearance: none;
      appearance: none;
    }
    .select_box-search-area {
      border-left: none;
      border-top: none;
      border-bottom: none;
      padding-left: 2%;
      font-size: 0.8rem;
      width: 20%; 
      margin-top: 1%;
      margin-right: 1%;
      height: auto;
    }
    .select_box-search-genre {
      border-left: none;
      border-top: none;
      border-bottom: none;
      padding-left: 1%; 
      font-size: 0.8rem;
      width: 22%;
      height: auto;
      margin-top: 1%;
    }
    .select_box-search-name {
      display: flex;
      width: 50%; 
      margin-top: 0.5%;    
    }
    .select_box-search-name-img1 {
      width: 5%;
      height: 50%;
      margin-left: 2%;
      margin-top: 2.5%;
      margin-right: 2%;
    }
    .select_box-search-name-shoplab {  
      margin-left: 1%;
      text-align: left;  
    }
    .select_box-search-name-shoptxt {
      border: none;
      margin-top: 1%;
      width: 100%;
      height: auto;
    }
    .section1 {
      display: flex;
      flex-wrap: wrap;
      background: #F8F8FF;
    }
    .shop_table {
      background-color: white;
      box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
      margin: 1% 1%;
      border-radius: 5px;
      width: 23%;
    }
    .shop_table--icon-img {
      width: 100%;
      height: 100%;
    }
    .shop_table-icon-img-png {
      border-radius: 5px 5px 0 0;
      width: 100%;
    }
    .shop_table-icon-name {
      font-weight: bold;
      font-size: 15px;
      border: none;
      padding-top: 8%;
      padding-bottom: 2%;
      padding-left: 5%;
    }
    .shop_table-icon-area, .shop_table-icon-category {
      display: inline-block;
      font-size: 10px;
      margin-bottom: 2%;
    }
    .shop_table-icon-area {
      margin-left: 5%;
    }
    .shop_table-icon-button {
      display: flex;
      width: 100%;
    } 
    .shop_table-icon-button_link {
      display: block;
      width: 50%;
    }
    .shop_table-icon-button-detail {
      display: block;
      font-size: 0.1rem;
      color: white;
      background-color: #2684ff;
      border-radius: 5px;
      outline: none;
      border: none;  
      margin-left: 5%;
      margin-bottom: 10%;
      width: 50%;
      padding-top: 4%;
      padding-bottom: 4%;
      padding-left: 1%;
      padding-right: 1%;
    }
    .shop_table-icon-favorite_gray, .shop_table-icon-favorite-red {
      display: block;
      width: 50%;
    }
    svg.w-5.h-5 { 
      width: 30px;
      height: 30px;
    }
    .shop_table-icon-img--gray {
      width:20%; 
    }
    .shop_table-icon-img--red {
      width:20%;  
    }
    .shop_table-icon-delate-button, .shop_table-icon-favorite-store-button {
      display: block;
      background-color: transparent;
      width: 100%;
      margin-left: 30%;
      border: none;
    }
    @media screen and (max-width: 768px) {
      .section0 {
        position: absolute;
        width: 96%;
        height: auto;
        font-size: 0.8rem;  
        margin-left: -24%;
        margin-top: 14%;  
      }
      .section1 {
        margin-top: 13%;  
      }
      .shop_table {
        display: block;
        width: 96%; 
        margin-left: 2%;
        margin-top: 2%;
        margin-bottom: %;
      } 
      .select_box-search-area, .select_box-search-genre, .shopname {
        font-size: 0.8rem;
      }   
    }
</style>
@endsection

<body>
@section('header') 
  <header class="section0">  
    <form action="/search" method="GET" name="myform">   
      @csrf    
      <nav class="select_box">
        <select class="select_box-search-area" name="area" id="area" onmouseup="clickEvent()">
          <option value="">All area</option>      
          <option value="1" @if(1 === (int)old('area')) selected @endif>東京都</option>
          <option value="2" @if(2 === (int)old('area')) selected @endif>大阪府</option>
          <option value="3" @if(3 === (int)old('area')) selected @endif>福岡県</option>
        </select>
        <select class="select_box-search-genre" name="genre" id="genre" onmouseup="clickEvent()">
          <option selected value="">All genre</option>      
          <option value="1" @if(1 === (int)old('genre')) selected @endif>イタリアン</option>
          <option value="2" @if(2 === (int)old('genre')) selected @endif>ラーメン</option>
          <option value="3" @if(3 === (int)old('genre')) selected @endif>居酒屋</option>
          <option value="4" @if(4 === (int)old('genre')) selected @endif>寿司</option>
          <option value="5" @if(5 === (int)old('genre')) selected @endif>焼肉</option>
        </select>
        <div class="select_box-search-name">
          <img class="select_box-search-name-img1" src="{{ asset('img/scope1.png')}}" alt=''>  
          <label class="select_box-search-name-shoplab"></label>
          <input class="select_box-search-name-shoptxt" type="text" placeholder="Search..." class="form-control" name="shopname" value=""> 
        </div>  
      </nav>
    </form>
  </header>
@endsection

@section('content')
  <div class="section1">
  @foreach($shops as $shop) 
    <table class="shop_table">
      <tbody class=shop_table-icon>  
        <tr class="shop_table-icon-img">
          <td><img src="{{$shop->shop_img}}" class="shop_table-icon-img-png"></td>
        </tr>
        <tr>
          <td class="shop_table-icon-name">{{$shop->shop_name}}</td>
        </tr>
        <tr>
      @if($shop->area_id == 1)
          <td class="shop_table-icon-area">#東京都</td>
      @elseif($shop->area_id == 2)  
          <td class="shop_table-icon-area">#大阪府</td> 
      @else($shop->area_id == 3)  
          <td class="shop_table-icon-area">#福岡県</td>
      @endif
      @if($shop->category_id == 1)          
          <td class="shop_table-icon-category">#イタリアン</td>
      @elseif($shop->category_id == 2)  
          <td class="shop_table-icon-category">#ラーメン</td>
      @elseif($shop->category_id == 3)  
          <td class="shop_table-icon-category">#居酒屋</td>
      @elseif($shop->category_id == 4)  
          <td class="shop_table-icon-category">#寿司</td>      
      @else($shop->category_id == 5)  
          <td class="shop_table-icon-category">#焼肉</td>
      @endif          
        </tr>
        <tr class=shop_table-icon-button>
          <td class="shop_table-icon-button_link">
            <form action="/detail/{{$shop->id}}" name="id" method="GET">
              @csrf
              <button class="shop_table-icon-button-detail">詳しく見る</button>
            </form>
          </td> 
    @if (Auth::check())
      @if($shop->isFavoritedBy() ==null)
          <td class="shop_table-icon-favorite_gray">    
            <form action="/favorite/{{$shop->id}}" name="id" method="POST" class="mb-4">
              @csrf 
              <input type="hidden" name="shop_id" value="{{$shop->id}}"> 
              <input type="hidden" name="user_id" value="{{Auth::id()}}">           
              <button type="submit" class="shop_table-icon-favorite-store-button" >        
                <img class="shop_table-icon-img--gray" src="{{ asset('img/heartGray.png')}}" alt=''> 
              </button>    
            </form>
          </td>       
      @else      
          <td class="shop_table-icon-favorite-red">
            <form action="/favorite/destroy/{{$shop->id}}" name="id" method="POST" class="mb-4">
              @csrf  
              <input type="hidden" name="shop_id" value="{{$shop->id}}">     
              <button type="submit" class="shop_table-icon-delate-button">              
                <img class="shop_table-icon-img--red" src="{{ asset('img/heartRed.png')}}" alt=''> 
              </button>
            </form> 
          </td>
      @endif
        </tr>
    @endif
      </tbody>
    </table>
  @endforeach   
  </div>
{{ $shops->links()}}  
@endsection
</body>
