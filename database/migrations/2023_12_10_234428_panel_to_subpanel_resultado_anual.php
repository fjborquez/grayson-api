<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PanelToSubpanelReporteAnual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panel_subpanel_resultado_anual', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('panel_id')->constrained('paneles');
            $table->foreignId('subpanel_res_anual_id')->constrained('subpaneles_resultado_anual');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('panel_subpanel_resultado_anual');
    }
}
