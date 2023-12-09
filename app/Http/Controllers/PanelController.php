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
        return Panel::with('series')->with('insiders')->find($id);
    }

    public function delete($id) {
        return Panel::find($id)->delete();
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

    public function addInsider($panelId, $insiderId) {
        $panel = Panel::find($panelId);
        $panel->insiders()->attach($insiderId);
        return $panel;
    }

    public function removeSerie($panelId, $serieId) {
        $panel = Panel::find($panelId);
        $panel->series()->detach($serieId);
        return $panel;
    }

    public function removeInsider($panelId, $insiderId) {
        $panel = Panel::find($panelId);
        $panel->insiders()->detach($insiderId);
        return $panel;
    }
}
