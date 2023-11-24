<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index() {
        return Panel::all();
    }

    public function show($id) {
        return Panel::with('series')->find($id);
    }
}
