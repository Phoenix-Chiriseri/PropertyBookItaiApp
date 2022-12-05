<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //function that will show the pricing screen
    public function index()
    {
        $prices = Pricing::all();
        return view('pages.pricingScreen')->with("prices",$prices);
    }

    public function addPriceScreen(){


        return view('pages.addNewPrice');
    }

    public function postPrice(Request $request){

        print_r($request->all());
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //function that will edit the price on the pricing screen
     public function editPrice($id){
        $price = Pricing::find($id);
        return view('pages.editPrice')->with('price',$price);
     }

     //function that will set a new price
     public function setNewPrice(Request $request,$id){
        $singlePrice=Pricing::findOrFail($id);
        $singlePrice->price=$request->input('price');
        $singlePrice->update();
        //redirect to the dashboard after setting a single price...
        return redirect("dashboard");
     }

}
