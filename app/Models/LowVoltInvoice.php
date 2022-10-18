<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowVoltInvoice extends Model
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
        'energiaBaixaTensaokWh',
        'energiaBaixaTensaoCusto',
        'data',
        'building_id',
    ];
}
