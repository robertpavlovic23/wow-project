<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use App\Models\Character;
use App\Models\Player;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RaidPlannerController extends Controller
{
    public function show() {
        return view('/raid-planner/show');
    }
}
