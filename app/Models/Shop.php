<?php

namespace App\Models;


use Illuminate\Support\Facades\Auth; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = ['area_id', 'category_id', 'shop_name', 'shop_info', 'shop_img'];

    public function reserves()
    {
        return $this->hasMany(Reserve::class);
    }
    public function favorites()
    {
        return $this->hasMany(Favorite::class);    
    } 
    public function isFavoritedBy() 
    {
        $item = Favorite::where('user_id', Auth::id())->where('shop_id', $this->id)->first() !==null;         
        return $item;
    }
}
