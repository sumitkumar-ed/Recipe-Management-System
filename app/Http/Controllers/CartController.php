<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
class CartController extends Controller
{
    //

    public function addToList(Request $req)
    {
        if (!($req->session()->has('user'))) 
        {
            return redirect('/login');
        } 
        elseif ((Auth::user()->role == '0')) 
        {
            $list= new Cart;
            $list->user_id=$req->session()->get('user')['id'];
            $list->recipe_id=$req->recipe_id;
            $list->save();
            return redirect('/');

        } 
        else 
        {
            return redirect()->back();
        }
    }


    static function listItem()
    {
        return Cart::where('user_id', auth()->id())->count();
        // dd($cartItems) ;
        // return Cart::where('user_id',$userId)->count();
    }
}
