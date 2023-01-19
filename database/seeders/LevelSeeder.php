<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lvl = ['Warga', 'Pra Warga', 'Sabuk Putih', 'Sabuk Hijau', 'Sabuk Jambon', 'Sabuk Polos'];

        for ($i = 0; $i < count($lvl); $i++) {
            $data = new Level();
            $data->name = $lvl[$i];
            $data->save();
        }
    }
}
