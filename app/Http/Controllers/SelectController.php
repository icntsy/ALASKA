<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Parameter;
use App\Models\Response;

class SelectController extends Controller
{
    // Metode ini digunakan untuk mendapatkan daftar dokter atau bidan berdasarkan jenis layanan yang dipilih
   public function doctor(Request $request){
       $data = [];

       $query = User::query();
       $query->select("id","name");

       if ($request->has("id_service")) {

           if ($request->id_service == "1") {
               $query->where("role", "dokter");
            }

            if ($request->id_service == "2") {
               $query->where("role", "bidan");
           }
       }

       if($request->has('q')){
           $search = $request->q;
           $data = $query->where('name','LIKE',"%$search%")
               ->get();
       }else{
           $data =  $query->limit(5)->get();
       }
       return response()->json($data);
   }

    // Metode ini digunakan untuk mendapatkan daftar layanan
    public function service(Request $request){
        $data = Service::all();
        if($request->has('q')){
            $search = $request->q;
            $data = Service::select("id","name")
                ->where('name','like',"%$search%")
                ->get();
        }
        return response()->json($data);

    }

    public function parameter(Request $request){
        $data = Parameter::all();
        if($request->has('q')){
            $search = $request->q;
            $data = Parameter::select("id","name")
            ->where('name','like',"%$search")
            ->get();
        }
        return response()->json($data);
    }

    public function response(Request $request){
        $data = Response::all();
        if($request->has('q')){
            $search = $request->q;
            $data = Response::select("id","success")
            ->where('success','like',"%$search")
            ->get();
        }
        return response()->json($data);
    }


}
