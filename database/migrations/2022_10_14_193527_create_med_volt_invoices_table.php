<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedVoltInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med_volt_invoices', function (Blueprint $table) {
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
            $table->unsignedInteger('demContratadaHFP');
            $table->unsignedInteger('demContratadaHP');
            $table->unsignedInteger('demAtivaHFP');
            $table->unsignedInteger('demAtivaHP');
            $table->decimal('demAtivaHFPCusto',11,2);
            $table->decimal('demAtivaHPCusto',11,2);
            $table->unsignedInteger('demAtivaHFPSemICMS');
            $table->unsignedInteger('demAtivaHPSemICMS');
            $table->decimal('demAtivaHFPSemICMSCusto',11,2);
            $table->decimal('demAtivaHPSemICMSCusto',11,2);
            $table->unsignedInteger('ultrapassagemHFP');
            $table->unsignedInteger('ultrapassagemHP');
            $table->decimal('ultrapassagemHFPCusto',11,2);
            $table->decimal('ultrapassagemHPCusto',11,2);
            $table->unsignedInteger('energiaAtivaHFP');
            $table->unsignedInteger('energiaAtivaHP');
            $table->decimal('energiaAtivaHFPCusto',11,2);
            $table->decimal('energiaAtivaHPCusto',11,2);
            $table->unsignedInteger('energiaReativaHFP');
            $table->unsignedInteger('energiaReativaHP');
            $table->decimal('energiaReativaHFPCusto',11,2);
            $table->decimal('energiaReativaHPCusto',11,2);
            $table->unsignedInteger('demandaReativaHFP');
            $table->unsignedInteger('demandaReativaHP');
            $table->decimal('demandaReativaHFPCusto',11,2);
            $table->decimal('demandaReativaHPCusto',11,2);
            $table->date('data');
            $table->unsignedInteger('building_id');
            
            $table->foreing('building_id')->references('id')->on('buildings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('med_volt_invoices');
    }
}
