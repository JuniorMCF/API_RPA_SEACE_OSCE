<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOscesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('osces', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->text("nombre_sigla_entidad")->nullable();
            $table->timestamp("fecha_publicacion")->nullable();

            $table->string("nomenclatura")->index()->nullable();//nomenclatura + objeto_contratacion
            $table->string("reiniciado_desde")->nullable();
            $table->string("objeto_contratacion")->nullable();
            $table->text("descripcion")->nullable();
            $table->string("codigo_snip")->nullable();
            $table->string("codigo_unico_inversion")->nullable();
            $table->decimal("valor_estimado",14,2)->unsigned()->nullable();
            $table->string("moneda")->nullable();
            $table->string("version_seace")->nullable();
            $table->string("acciones")->nullable();
            $table->string("estado")->nullable();

            $table->string("departamento");

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
        Schema::dropIfExists('osces');
    }
}
