<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\favorite;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Requests\ReserveRequest;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{

    public function index(Request $request)
    {
        return view('reserve');
    }
    public function store(ReserveRequest $request)
    {    
        $form = $request->all(); 
        $shop = Reserve::create($form);  
        return view('reserve')->with(['shop' => $shop 
        ]); 
    }
    public function update(ReserveRequest $request)
    {    
        $form = $request->all(); 
        unset($form['_token']);
        Reserve::where('id', $request->id)-> update($form); 
        return back();     
    }
    public function destroy(Request $request, $id)
    {   
        Reserve::find($id)->delete();         
        return back();     
    }
}
