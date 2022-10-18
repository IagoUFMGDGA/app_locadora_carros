<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;
    protected $fillable = [
            'unityType', 
            'voltage', 
            'cep',
            'cnpj',
            'numeroInstalacao',
            'numeroCliente', 
            'nome', 
            'logradouro', 
            'numero', 
            'complemento', 
            'bairro', 
            'tariffMode_id',
            'campu_id',
            'aggroupment_id',
    ];
}
