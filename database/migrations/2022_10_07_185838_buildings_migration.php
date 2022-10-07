<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuildingsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $this->id();
            $this->enum('unityType', ['acadêmica','administrativa']);
            $this->enum('voltage', ['média','baixa']);
            $this->enum('campus', ['outras localidades','pampulha', 'saúde e centro']);
            $this->enum('installationType', ['verde','amarela', 'vermelha - p1','vermelha - p2','escassez hídrica']);
            $this->enum('agrupamento', ['icex','icb','eba','ica','igc','esc. veterinaria', 'fae', 'fac. medicina', 'mnhjb', 'pç de serviços', 'demai', 'esc. engenharia', 'direito' ]);
            $this->char('cep',9);
            $this->char('clienteNumber',10);
            $this->char('cnpj',14);
            $this->char('installationNumber', 10);
            $this->ipAddress('name');
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
