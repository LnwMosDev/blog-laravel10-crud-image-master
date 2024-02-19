<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CityList;

class HomeController extends Controller
{
    public function index()
    {
        $cities = CityList::all(); 
        return view('index', ['cities' => $cities]);
    }
}
