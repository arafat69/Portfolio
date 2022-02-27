<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\Social;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request)
    {
        $social = Social::all();
        $skill = Skill::all();
        $portfolio = Portfolio::all();
        return view('home',compact('social','skill','portfolio'));
    }
}
