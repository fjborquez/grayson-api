<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index(){
        return Serie::all();
    }

    public function show($id){
        return Serie::with('datos')->find($id);
    }
}
