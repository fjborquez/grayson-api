<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWTAuth;

class PanelController extends Controller
{
    public function index() {
        return Panel::all();
    }

    public function show($id) {
        return Panel::with('series')->find($id);
    }

    public function store(Request $request) {
        $user = Auth::user();
        $panel = new Panel;
        $panel->nombre = $request->nombre;
        $panel->descripcion = $request->descripcion;
        $panel->user_id = $user->id;
        $panel->save();

        return response()->json(["message" => "Agregado" ], 201);
    }

    public function addSerie($panelId, $serieId) {
        $panel = Panel::find($panelId);
        $panel->series()->attach($serieId);
        return $panel;
    }

    public function removeSerie($panelId, $serieId) {
        $panel = Panel::find($panelId);
        $panel->series()->detach($serieId);
        return $panel;
    }
}
