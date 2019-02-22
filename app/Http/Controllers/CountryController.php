<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Countrylanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CountryController extends Controller
{
    public function getCountryByCode($code){
        $langs = Countrylanguage::where('CountryCode','=', $code)->get();

       for($i = 0 ; $i < count($langs) ; $i++){
           $tmp = $langs[$i];
           $langs[$i] = [
               $tmp->Language => [
                'isOficial' => $tmp->IsOfficial === 'F' ? false : true,
                'percentage' => $tmp->Percentage
               ]
               ];
       }

        $country = Country::findOrFail($code);

        return response(view('country', ['country' => $country, 'langs' => $langs]), 
        200, 
        ['Content-Type' => 'application/json']);
    }

    public function updateHS(Request $request, $code){
        $country = Country::findOrFail($code);
        $validation = Validator::make($request->all(),[
            'HeadOfState'=>'required'
        ]);
        if(!$validation->fails()){
            if($request->HeadOfState !== ''){
                $country->HeadOfState = $request->HeadOfState;
                $country->save();
                return response()->json([
                    'success' => true,
                    'Message'=>'Updated successfully'
                ]);
            }
        }
        return response()->json([
            'success' => false,
            'Message'=>'Invalid data'
        ], 400);
    }
}
