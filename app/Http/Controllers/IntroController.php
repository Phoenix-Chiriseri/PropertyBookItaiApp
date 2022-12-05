<?php

namespace App\Http\Controllers;

use App\Models\Intro;
use Illuminate\Http\Request;
use App\Models\IntroContent;

class IntroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //this is the function that will return the intro page to be edited by the user
    public function index()
    {
         return view('pages.introScreen');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //function that will store and upload the image, change the introduction name and the content
    public function store(Request $request)
    {   
        //validate the images by the extensions...
        $intro = new Intro();
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath =  public_path('/images' . '/');
        $intro->path = $fileName;
        $request->file->move(public_path('images'), $fileName);
        $intro->name=$request->input('intro_name');
        $intro->description=$request->input('intro_content');
        $intro->save();
        return redirect('dashboard');
    }
}
