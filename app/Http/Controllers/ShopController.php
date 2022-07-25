<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Area;
use App\Models\Favorite;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index(Request $request)
    { 
        $shops = Shop::Paginate(16); 
        return view('index', ['shops' => $shops]);
    }
    public function detail(Request $request, $id)
    {
        $shop = Shop::find($id);        
        $param = [
            'input' => $request->input,
            'shop' => $shop
        ];
        return view('detail', $param);
    }
    public function search(Request $request)
    {
        $s_area = $request->area;
        $s_genre = $request->genre;     
        $s_shopname = $request->shopname;        
        if(!empty($s_area) && empty($s_genre) && empty($s_shopname)){    
            $query = Shop::query();       
            $shops = $query->where('area_id', $s_area)->get();  
            $shops = $query->Paginate(16);
            $request->flash();
            return view('index')->with(['shops' => $shops
        ]);
        } 
        elseif(empty($s_area) && !empty($s_genre) && empty($s_shopname)){ 
            $query = Shop::query();                  
            $shops = $query->where('category_id', $s_genre)->get();         
            $shops = $query->Paginate(16); 
            $request->flash();                   
            return view('index')->with(['shops' => $shops 
        ]);
        } 
        elseif(empty($s_area) && empty($s_genre) && !empty($s_shopname)){  
            $query = Shop::query();               
            $shops = $query->where('shop_name', 'like', '%'.$s_shopname.'%')->get();                 
            $shops = $query->Paginate(16);  
            $request->flash();                         
            return view('index')->with(['shops' => $shops 
        ]);
        }             
        elseif(!empty($s_area) && !empty($s_genre) && empty($s_shopname)){  
            $query = Shop::query();               
            $shops = $query->where('area_id', $s_area)->get();   
            $shops = $query->where('category_id', $s_genre)->get();           
            $shops = $query->Paginate(16); 
            $request->flash();                   
            return view('index')->with(['shops' => $shops 
        ]);
        } 
        elseif(empty($s_area) && !empty($s_genre) && !empty($s_shopname)){  
            $query = Shop::query();               
            $shops = $query->where('category_id', $s_genre)->get(); 
            $shops = $query->where('shop_name', 'like', '%'.$s_shopname.'%')->get(); 
            $shops = $query->Paginate(16); 
            $request->flash();              
            return view('index')->with(['shops' => $shops 
        ]);
        }
        elseif(!empty($s_area) && empty($s_genre) && !empty($s_shopname)){  
            $query = Shop::query();               
            $shops = $query->where('area_id', $s_area)->get();   
            $shops = $query->where('shop_name', 'like', '%'.$s_shopname.'%')->get(); 
            $shops = $query->Paginate(16);
            $request->flash();            
            return view('index')->with(['shops' => $shops 
        ]);
        }                             
        elseif(!empty($s_area) && !empty($s_genre) && !empty($s_shopname)){  
            $query = Shop::query();               
            $shops = $query->where('area_id', $s_area)->get();   
            $shops = $query->where('category_id', $s_genre)->get();
            $shops = $query->where('shop_name', 'like', '%'.$s_shopname.'%')->get();                                            
            $shops = $query->Paginate(16);
            $request->flash();            
            return view('index')->with(['shops' => $shops 
        ]);
        } 
        elseif(empty($s_area) && empty($s_genre) && empty($s_shopname)){  
            $query = Shop::query();               
            $shops = $query->where('area_id', $s_area)->get();   
            $shops = $query->where('category_id', $s_genre)->get();
            $shops = $query->where('shop_name', 'like', '%'.$s_shopname.'%')->get();                                            
            $shops = $query->Paginate(16);
            $request->flash();            
            return redirect('/');    
        }                     
        else {
             return redirect('/');     
        }                                                
    }
}



    
