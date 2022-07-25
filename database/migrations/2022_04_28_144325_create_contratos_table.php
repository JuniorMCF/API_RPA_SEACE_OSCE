<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->text("postor")->nullable();
            $table->string("mype")->nullable();
            $table->string("ley_promocion_de_selva")->nullable();
            $table->string("bonificacion_colindante")->nullable();
            $table->decimal("cantidad_adjudicada", 12, 2)->nullable();
            $table->decimal("monto_adjudicado", 12, 2)->nullable();


            $table->string("nomenclatura")->nullable();
            $table->foreign("nomenclatura")->references("nomenclatura")->on("osces")->onDelete("cascade");

            $table->string("estado")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
