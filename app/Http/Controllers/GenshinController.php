<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;

class GenshinController extends Controller
{
    public function index()
    {
        $characters = Character::all(); 
        return view('genshinList', ['characters' => $characters]);
    }
}
