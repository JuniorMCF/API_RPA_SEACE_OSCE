<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidades', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->text("entidad_contratante")->nullable();
            $table->text("direccion_legal")->nullable();
            $table->text("pagina_web")->nullable();
            $table->string("telefono")->nullable();

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
        Schema::dropIfExists('entidades');
    }
}
