<?php

namespace App\Http\Controllers;

use App\Models\Panel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    public function index(Request $request) {
        $paneles = new Panel;

        if ($request->has('user_id')) {
            $paneles = $paneles->where('user_id', $request->get('user_id'));
        }

        return $paneles->get();
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
