<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //get the services and display them on the screen
    public function index()
    {
        $services = Db::select("SELECT * from services");
        return view('pages.servicesScreen')->with('services',$services);
    }

    public function addServicesScreen(){

        return view('pages.addServiceScreen');
    }


    public function postService(Request $request){

        $service = new Services();
        $service->name = $request->input('service_name');
        $service->description = $request->input('service_description');
        $service->save();
        return redirect('/dashboard');
    }
    //edit a single service by id
    public function editService($id){
        $service = Services::find($id);
        return view('pages.editService')->with('service',$service);
    }

    //update a single service by id
    public function updateService(Request $request,$id){
        $service = Services::findOrFail($id);
        $service->name=$request->input('title');
        $service->description=$request->input('description');
        $service->update();
        return redirect("servicesScreen");
    }
}
