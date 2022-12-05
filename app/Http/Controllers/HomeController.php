<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pricing;


class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */

    //the dashboard view will return a single logged in user
    public function index()
    {
        $user = Auth::user();
        return view('pages.dashboard')->with("user",$user);
    }

    //the main website page will return three sections, the intoduction section, the pricing section and the story section. All the data is coming from the database and is populating the main page
    public function welcome(){
        $record = Db::select("SELECT * FROM intros order by id desc LIMIT 1 ;");
        $prices = Pricing::all();
        $services = Db::select("SELECT * FROM services");
        $story = DB::select("SELECT * FROM stories order by id desc LIMIT 1");
        return view("welcome")->with('record',$record)->with('story',$story)->with('services',$services)->with('prices',$prices);
    }
    
    //this is the function that will return the services screen...
    public function getServices(){
        $services = Db::select("SELECT * from services");
        //dd($services);
        return view('pages.servicesScreen');
    }
}
