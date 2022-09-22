<?php
    namespace  App\Repositories;
    use Illuminate\Database\Eloquent\Model;
    
    abstract class AbstractRepository
    {
        public function __construct (Model $model)
        {
            $this->model = $model;
        }
        public function selectAtributosRegistrosRelacionados($atributos)
        {
            $this->model = $this->model->with($atributos);
            // a query está sendo montada
        }
        public function filtro($filtroParams)
        {
            
            $filtro = explode(';', $filtroParams);
            foreach($filtro as $key => $condicao){
                $c = explode(':', $condicao);
                $this->model = $this->model->where($c[0],$c[1],$c[2]);
                // a query está sendo montada 
            }
        }
        public function selectAtributos($atributos)
        {
            $this->model = $this->model->selectRaw($atributos);
            // é necessário que id esteja no contexto da requisição, do contrário with não
            // conseguirá encontrar modelos 
        }
        public function getResultado()
        {
            return $this->model->get();
            // all() -> cria um obj de consulta e executa get() = retorna collection
            // get() -> permite modificar a query antes de retornar a collection
        }
    }