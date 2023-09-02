<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Building;

class BuildingSeeder extends Seeder
{
    //use WithoutModelEvents;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataSource = Storage::get('seeding_data/buildings.json');
        $data = json_decode($dataSource, true);

        foreach ($data as $item) {
            Building::create($item);
        }
    }
}
