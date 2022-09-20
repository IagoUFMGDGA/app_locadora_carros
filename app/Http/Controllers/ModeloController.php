<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModeloController extends Controller
{
    public function __construct(Modelo $modelo){
        $this->modelo = $modelo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('attrib_marca')){
            $attrib_marca = $request->attrib_marca;
            $modelos = $this->modelo->with('marca:id,'.$attrib_marca);
        }else{
            $modelos = $this->modelo->with('marca');
        }
        
        if($request->has('filtro')){

            $filtro = explode(';', $request->filtro);
            
            foreach($filtro as $key => $condicao){
                $c = explode(':', $condicao);
                $modelos = $modelos->where($c[0],$c[1],$c[2]);
            }

        }

        if($request->has('atributos')){
            $atributos = $request->atributos;
            $modelos = $modelos->selectRaw($atributos)->get(); 
            // é necessário que marca_id esteja no contexto da requisição, do contrário with não
            // conseguirá encontrar marca
        }else{
            $modelos = $modelos->get();
        }
        return  response()->json($modelos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->modelo->rules());
        
        
        $imagem = $request->file("imagem");
        $imagem_urn = $imagem->store('imagens/modelos', 'public');

        $modelo = $this->modelo->create([
            'marca_id' => $request->marca_id,
            'nome' => $request->nome,
            'imagem' => $imagem_urn,
            'numero_portas' => $request->numero_portas,
            'lugares' => $request->lugares,
            'air_bag' => $request->air_bag,
            'abs' => $request->abs,
        ]);

        return response()->json($modelo, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
     {
        $modelo = $this->modelo->with('marca')->find($id);
        if($modelo === null){
            return response()->json(['erro'=>'ERRO! O item buscado não existe.'], 404);
        }
                
        return response()->json($modelo, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modelo = $this->modelo->find($id);

        if($modelo === null){
             return response()->json(['erro'=>'ERRO! O item buscado não existe.'], 404);
        }
        
        if($request->method() === 'PATCH'){

            $regrasDinamicas = array();

            foreach ($modelo->rules() as $input => $regra) {
                if(array_key_exists($input, $request->all())){
                    $regrasDinamicas[$input] = $regra;
                }    
            }
            $request->validate($regrasDinamicas);
        }else{
            $request->validate($modelo->rules());
        }
        // remove o arquivo antigo caso um novo arquivo seja recebido no request
        if($request->file('imagem')){
            Storage::disk('public')->delete($modelo->imagem);
        }

        $imagem = $request->file("imagem");
        $imagem_urn = $imagem->store('imagens/modelos', 'public');
        
        // altera o objeto com base nos parâmetros do array da requisição
        $modelo->fill($request->all());
        $modelo->imagem = $imagem_urn;
        // tem a inteligencia de atualizar um registro caso o id esteja definido e
        // de criar um novo registro caso não haja um id definido
        $modelo->save(); 

        /*
        $modelo->update([
            'marca_id' => $request->marca_id,
            'nome' => $request->nome,
            'imagem' => $imagem_urn,
            'numero_portas' => $request->numero_portas,
            'lugares' => $request->lugares,
            'air_bag' => $request->air_bag,
            'abs' => $request->abs,
        ]);
        */
        return response()->json($modelo, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
     {
        $modelo = $this->modelo->find($id);
        if($modelo === null){
             return response()->json(['erro'=>'ERRO! O item buscado não existe.'], 404);
        }
        // remove o arquivo antigo  
        Storage::disk('public')->delete($modelo->imagem);
        

        $modelo->delete();

        return response()->json(['msg' => 'Deleção concluída com sucesso!'], 200);
    }
}
