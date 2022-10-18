<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campu;

class CampuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campi = [
            'Pampulha',
            'Saúde e Centro',
            'Outras Localidades'
        ];

        foreach ($campi as $campus_name){
            $campus = new Campu();
            $campus->descricao = $campus_name; 
            $campus->save();
        };
    }
}
