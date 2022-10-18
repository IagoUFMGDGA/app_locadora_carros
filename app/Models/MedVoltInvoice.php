<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedVoltInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'dmic',
        'irpj',
        'pisPasep',
        'cofins',
        'csll',
        'outrosImpostos',
        'visitaTecCusto',
        'ilumiPubContrib',
        'juros',
        'multas',
        'correcoesCustos',
        'demContratadaHFP',
        'demContratadaHP',
        'demAtivaHFP',
        'demAtivaHP',
        'demAtivaHFPCusto',
        'demAtivaHPCusto',
        'demAtivaHFPSemICMS',
        'demAtivaHPSemICMS',
        'demAtivaHFPSemICMSCusto',
        'demAtivaHPSemICMSCusto',
        'ultrapassagemHFP',
        'ultrapassagemHP',
        'ultrapassagemHFPCusto',
        'ultrapassagemHPCusto',
        'energiaAtivaHFP',
        'energiaAtivaHP',
        'energiaAtivaHFPCusto',
        'energiaAtivaHPCusto',
        'energiaReativaHFP',
        'energiaReativaHP',
        'energiaReativaHFPCusto',
        'energiaReativaHPCusto',
        'demandaReativaHFP',
        'demandaReativaHP',
        'demandaReativaHFPCusto',
        'demandaReativaHPCusto',
        'data',
        'building_id',
    ];
}
