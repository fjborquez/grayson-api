<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class DeleteTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('panel_subpanel_resultado_anual');
        Schema::dropIfExists('panel_serie');
        Schema::dropIfExists('panel_subpanel_insider');
        Schema::dropIfExists('subpaneles_resultado_anual');
        Schema::dropIfExists('subpaneles_insider');
        Schema::dropIfExists('opciones');
        Schema::dropIfExists('configuraciones');
        Schema::dropIfExists('paneles');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
