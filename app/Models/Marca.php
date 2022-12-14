<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'imagem'];


    public function rules(){
        return [
            'nome' => 'required|unique:marcas,nome,'.$this->id,
            'imagem' => 'required|file|mimes:png'
        ];

        /*
            Parâmetros da validação unique

            1)tabela
            2)nome da coluna que será pesquisada na tabela
            3)id do registro que o unique desconsiderará no seu teste
        */
    }
    public function feedback(){
        return [
            'unique' => 'O conteúdo do campo :attribute já existe',
            'required' => 'O campo :attribute é necessário',
            'imagem.mimes' => 'Somente formato .png é aceito',
        ];
    }

    public function modelos(){
        // UMA marca possui MUITOS modelos
        return $this->hasMany('App\Models\Modelo');
    }
}
