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
