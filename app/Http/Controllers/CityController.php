<?php

namespace App\Http\Controllers;

use App\Models\CityList;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = CityList::all(); // ดึงข้อมูลทั้งหมดจากตาราง citys
        return view('cityList', ['cities' => $cities]);
    }
}
