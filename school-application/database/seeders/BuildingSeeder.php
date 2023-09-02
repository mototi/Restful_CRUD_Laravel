<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataSource = Storage::get('seeding_data/buildings.json');
        $data = json_decode($dataSource, true);

        foreach ($data as $item) {
            Log::debug($item);
        }
    }
}
