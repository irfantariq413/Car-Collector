<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarListApiController extends Controller
{
    public function list(){
        $cars=Car::all();
        return response()->json(['cars'=>$cars], 200);
    }
}
