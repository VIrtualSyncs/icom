<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Highlight;
use App\Models\heroes;
use App\Models\Facilities;
use App\Models\HouseType;
class usercontroller extends Controller

{
    public function index_user()
    {
        $heroes = heroes::all();
        $facilities  = facilities::all();
        $highlights = Highlight::all();
        $houseTypes = HouseType::all();

        return view('user.index', compact('heroes', 'facilities', 'highlights', 'houseTypes'));
    }



}


