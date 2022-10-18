<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TariffMode;

class TariffModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $modes = [
            'Convencional - B3',
            'A1 - Azul',
            'A2 - Azul',
            'A3 - Azul',
            'A4 - Azul',
            'AS - Azul',
            'A3A - Verde',
            'A4 - Verde',
            'AS - Verde'
        ];

        foreach ($modes as $mode){
            $tariff_mode = new TariffMode();
            $tariff_mode->descricao = $mode; 
            $tariff_mode->save();
        };

    }
}
