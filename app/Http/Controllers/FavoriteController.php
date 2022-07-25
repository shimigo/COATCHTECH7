<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\User;
use App\Models\shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, Favorite::$rules);       
        $form = $request->all();     
        Favorite::create($form); 
        return redirect('/');   
    }
    public function destroy(Request $request, $id)
    {  
        $shop=Shop::find($id);
        $shop->favorites()->delete();
        return redirect('/');
    }
}
