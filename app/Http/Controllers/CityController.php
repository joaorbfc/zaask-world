<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function getCities($code){
        return City::where('CountryCode', $code)->get();
    }

    public function getCity($id){
        return City::findOrFail($id);
    }

    public function deleteCity($id){
        $city = City::find($id);
        if($city){
            $city->delete();
        }else{
            return response()->json([
                'success' => false,
                'Message'=>'City not found'
            ]);
        }
        return response()->json([
            'success' => true,
            'Message'=>'City successfully deleted'
        ]);
    }

    public function addCity(Request $request){
        $validation = Validator::make($request->all(),[
            'Name'=>'required',
            'CountryCode'=>'required',
            'District'=>'required',
            'Population'=>'required'
        ]);

        if($validation->fails()){
            return response()->json([
                'success' => false,
                'Message'=>'Invalid data'
            ]);
        }else{
            $city = City::create($request->all());
        }
        

        if($city){
            return response()->json([
                'success' => true,
                'Message'=>'City successfully created'
            ]);
        }else{
            return response()->json([
                'success' => false,
                'Message'=>'City not found'
            ]);
        }
    }
}