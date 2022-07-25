<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCronogramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronogramas', function (Blueprint $table) {
            $table->bigIncrements("id");

            $table->text("etapa")->nullable();

            $table->timestamp("fecha_inicio")->nullable();
            $table->timestamp("fecha_fin")->nullable();

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
        Schema::dropIfExists('cronogramas');
    }
}
