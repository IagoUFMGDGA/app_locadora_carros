<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    
    protected $fillable = ['marca_id', 'nome', 'imagem', 'numero_portas', 'lugares', 'air_bag', 'abs'];

    public function rules(){
        return [
            'marca_id' => 'exists:marcas,id',
            'nome' => 'required|unique:modelos,nome,'.$this->id.'min:3',
            'imagem' => 'required|file|mimes:png,jpeg,jpg,'.$this->id.'min:3',
            'numero_portas' => 'required|integer|digits_between:1,5',
            'lugares' => 'required|integer|digits_between:1,20',
            'air_bag' => 'required|boolean',
            'abs' => 'required|boolean', // true/1/"1", false/0/"0",
        ];

        /*
            Parâmetros da validação unique

            1)tabela
            2)nome da coluna que será pesquisada na tabela
            3)id do registro que o unique desconsiderará no seu teste
        */
    }
    public function marca(){
        // UM modelo pertence a UMA marca
        return $this->belongsTo('App\Models\Marca');
    }
}
