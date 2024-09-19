<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('environments')->insert([
            [   
                'code' => 'ENV001',
                'name' => 'Registration',
                'start_time' => '2022-11-21 00:00:00',
                'end_time' => '2023-12-26 23:59:59',
            ],
            [   
                'code' => 'ENV002',
                'name' => 'Early Bird',
                'start_time' => '2022-11-21 00:00:00',
                'end_time' => '2023-12-12 23:59:59',
            ],
            [   
                'code' => 'ENV003',
                'name' => 'Submission Storytelling Preliminary',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV004',
                'name' => 'Submission Storytelling SemiFinal',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV005',
                'name' => 'Submission Storytelling Final',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV006',
                'name' => 'Submission Debate Preliminary',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV007',
                'name' => 'Submission Debate SemiFinal',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV008',
                'name' => 'Submission Debate Final',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV009',
                'name' => 'Submission Speech Preliminary',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV010',
                'name' => 'Submission Speech SemiFinal',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV011',
                'name' => 'Submission Speech Final',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV012',
                'name' => 'Submission Newscasting Preliminary',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV013',
                'name' => 'Submission Newscasting SemiFinal',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV014',
                'name' => 'Submission Newscasting Final',
                'start_time' => null,
                'end_time' => null,
            ],
            [   
                'code' => 'ENV015',
                'name' => 'Certificate',
                'start_time' => '2023-09-21 00:00:00',
                'end_time' => '2023-09-26 23:59:59',
            ],
        ]);
    }
}
