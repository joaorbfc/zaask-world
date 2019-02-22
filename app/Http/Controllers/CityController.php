<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    public function getCities($code){
        $cities = City::where('CountryCode', $code)->get();

       for($i = 0 ; $i < count($cities) ; $i++){
        $tmp = $cities[$i];
        $cities[$i] = [
                'cityName' => $tmp->Name,
                'countryCode' => $tmp->CountryCode,
                'district' => $tmp->District,
                'Population' => $tmp->Population
            ];
        }
        return $cities;
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
            ], 404);
        }
        return response()->json([
            'success' => true,
            'Message'=>'City successfully deleted'
        ], 204);
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
            ], 400);
        }else{
            $city = City::create($request->all());
        }
        

        if($city){
            return response()->json([
                'success' => true,
                'Message'=>'City successfully created'
            ], 201);
        }else{
            return response()->json([
                'success' => false,
                'Message'=>'City not found'
            ], 404);
        }
    }
}
