<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peringatandini;

class ApiController extends Controller
{
    public function banjir() {
        return response()->json(Peringatandini::where('id', 2)->get());
    }
}
