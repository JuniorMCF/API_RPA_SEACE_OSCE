<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesContratantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades_contratantes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("RUC")->nullable();
            $table->text("entidad_contratante")->nullable();

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
        Schema::dropIfExists('entidades_contratantes');
    }
}
