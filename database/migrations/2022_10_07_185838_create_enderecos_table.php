<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('logradoudo');
            $table->ipAddress('numero');
            $table->ipAddress('complemento');
            $table->ipAddress('bairro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('enderecos');
    }
}
