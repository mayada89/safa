<?php

namespace Database\Seeders;

use App\Pitche\Domain\Models\Pitche;
use App\Stadium\Domain\Models\Stadium;
use Illuminate\Database\Seeder;

class StadiumsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //---- Statdium Data -----
        $data = [
            [
                'ar' => ['name' => 'الملعب الفضي'],
                'en' => ['name' => 'Silver Stadium'],
            ],

            [
                'ar' => ['name' => 'الملعب الذهبي'],
                'en' => ['name' => 'Golden Stadium'],
            ],
        ];

        foreach ($data as $row) {
            //--- Create many stadiums ----
            $stadium = Stadium::create($row);

            //--- Create many pitches ----
            Pitche::create(
                [
                    'stadium_id' => $stadium->id,
                    'ar' => ['name' => 'المدرج رقم ١'],
                    'en' => ['name' => 'Pitche Number 1'],
                ]
            );

            Pitche::create(
                [
                    'stadium_id' => $stadium->id,
                    'ar' => ['name' => 'المدرج رقم ٢'],
                    'en' => ['name' => 'Pitche Number 2'],
                ]);

            Pitche::create(
                [
                    'stadium_id' => $stadium->id,
                    'ar' => ['name' => 'المدرج رقم ٣'],
                    'en' => ['name' => 'Pitche Number 3'],
                ]);

        }

    }
}
