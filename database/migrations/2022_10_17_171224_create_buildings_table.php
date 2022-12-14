<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // installationType === tariffModality
        // ['icex','icb','eba','ica','igc','esc. veterinaria', 'fae', 'fac. medicina', 'mnhjb', 'pç de serviços', 'demai', 'esc. engenharia', 'direito' ]
        Schema::create('buildings', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->timestamps();
            $table->enum('unityType', ['acadêmica','administrativa']);
            $table->enum('voltage', ['média','baixa']);
            $table->char('cep',9);
            $table->char('cnpj',14);
            $table->char('numeroInstalacao', 10);
            $table->char('numeroCliente', 10);
            $table->string('nome', 70);
            $table->string('logradouro', 70);
            $table->string('numero', 25);
            $table->string('complemento', 45);
            $table->string('bairro', 45);
            $table->unsignedInteger('tariffFlag_id');
            $table->unsignedInteger('tariffMode_id');
            $table->unsignedInteger('campu_id');
            $table->unsignedInteger('aggroupment_id');
            
            $table->foreign('tariffFlag_id')->references('id')->on('tariff_flags');
            $table->foreign('tariffMode_id')->references('id')->on('tariff_modes');
            $table->foreign('campu_id')->references('id')->on('campus');
            $table->foreign('aggroupment_id')->references('id')->on('aggroupments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buildings');
    }
}
