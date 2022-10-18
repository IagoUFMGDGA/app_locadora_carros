<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TariffFlag;

class TariffFlagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flags = [
            "Verde",
            "Amarela",
            "Vermelha - P1",
            "Vermelha - P2",
            "Escassez Hídrica"
        ];

        foreach ($flags as $flag){
            $tariff_flag = new TariffFlag();
            $tariff_flag->descricao = $flag; 
            $tariff_flag->save();
        };
    }
}
