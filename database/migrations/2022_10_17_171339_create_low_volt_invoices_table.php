<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowVoltInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('low_volt_invoices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->decimal('dmic',11,2);
            $table->decimal('irpj',11,2);
            $table->decimal('pisPasep',11,2);
            $table->decimal('cofins',11,2);
            $table->decimal('csll',11,2);
            $table->decimal('outrosImpostos',11,2);
            $table->decimal('visitaTecCusto',11,2);
            $table->decimal('ilumiPubContrib',11,2);
            $table->decimal('juros',11,2);
            $table->decimal('multas',11,2);
            $table->decimal('correcoesCustos',11,2);
            $table->unsignedInteger('energiaBaixaTensaokWh');
            $table->decimal('energiaBaixaTensaoCusto', 11, 2);
            $table->date('refDate');
            $table->date('readDate');
            $table->unsignedInteger('building_id');
            
            $table->foreign('building_id')->references('id')->on('buildings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('low_volt_invoices');
    }
}
