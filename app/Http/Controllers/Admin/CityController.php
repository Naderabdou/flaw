<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequset;
use App\Models\City;
use App\Models\splash;
use Illuminate\Http\Request;
use Monarobase\CountryList\CountryListFacade;

class CityController extends Controller
{
    public function index(){


        $City=  City::get();


        return view('dashboard.city.index',compact('City'));
    }
    public function store(CityRequset $request){
       $data= $request->validated();
        City::create($data);
        return redirect()->route('city.index');

    }
    public function show($id){
        City::destroy($id);
        return redirect()->back();

    }

}
