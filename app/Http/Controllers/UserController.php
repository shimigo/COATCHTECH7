<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Favorite;
use App\Models\Shop;
use App\Models\Reserve;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function mypage(Request $request, $id)
    { 
        $items = User::find($id);           
        $reserves = Reserve::where('user_id',$id)->get();         
        $favorites = Favorite::where('user_id',$id)->get();       
        return view('mypage', compact('items', 'reserves', 'favorites'));
    }    
}

