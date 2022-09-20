<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{

    public function __construct(Marca $marca){
        $this->marca = $marca;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $marcas = $this->marca->with('modelos')->get();
        // all() -> cria um obj de consulta e executa get() = retorna collection
        // get() -> permite modificar a query antes de retornar a collection
        return  response()->json($marcas, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->marca->rules(), $this->marca->feedback());
        
        
        $imagem = $request->file("imagem");
        $imagem_urn = $imagem->store('imagens', 'public');

        $marca = $this->marca->create([
            'nome' => $request->nome,
            'imagem' => $imagem_urn
        ]);

        return response()->json($marca, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = $this->marca->with('modelos')->find($id);
        if($marca === null){
            return response()->json(['erro'=>'ERRO! O item buscado não existe.'], 404);
        }
                
        return response()->json($marca, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marca = $this->marca->find($id);

        if($marca === null){
             return response()->json(['erro'=>'ERRO! O item buscado não existe.'], 404);
        }
        
        if($request->method() === 'PATCH'){

            $regrasDinamicas = array();

            foreach ($marca->rules() as $input => $regra) {
                if(array_key_exists($input, $request->all())){
                    $regrasDinamicas[$input] = $regra;
                }       
            }
            $request->validate($regrasDinamicas, $marca->feedback());
        }else{
            $request->validate($marca->rules(), $marca->feedback());
        }
        // remove o arquivo antigo caso um novo arquivo seja recebido no request
        if($request->file('imagem')){
            Storage::disk('public')->delete($marca->imagem);
        }
        $imagem = $request->file("imagem");
        $imagem_urn = $imagem->store('imagens', 'public');

        $marca->update([
            'nome' => $request->nome,
            'imagem' => $imagem_urn
        ]);
        return response()->json($marca, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = $this->marca->find($id);
        if($marca === null){
             return response()->json(['erro'=>'ERRO! O item buscado não existe.'], 404);
        }
        // remove o arquivo antigo  
        Storage::disk('public')->delete($marca->imagem);
        

        $marca->delete();

        return response()->json(['msg' => 'Deleção concluída com sucesso!'], 200);
    }
}
