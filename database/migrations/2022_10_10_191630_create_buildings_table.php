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
            $table->id();
            $table->unsignedBigInteger('endereco_id');
            $table->enum('unityType', ['acadêmica','administrativa']);
            $table->enum('voltage', ['média','baixa']);
            $table->enum('campus', ['outras localidades','pampulha', 'saúde e centro']);
            $table->enum('tariffModality', ['A1 - Azul','A2 - Azul','A3 - Azul','A4 - Azul', 'AS - Azul','A3A - Verde', 'A4 - Verde', 'AS - Verde']);
            $table->char('cep',9);
            $table->char('cnpj',14);
            $table->char('installationNumber', 10); 
            $table->char('clientNumber',10);
            $table->ipAddress('name');
            $table->enum('aggroupment',['icex','icb','eba','ica','igc','esc. veterinaria', 'fae', 'fac. medicina', 'mnhjb', 'pç de serviços', 'demai', 'esc. engenharia', 'direito' ] );
            $table->foreign('endereco_id')->references('id')->on('enderecos');
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
