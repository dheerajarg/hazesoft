<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Company::truncate();

        $company =  [
            [
              'name' => 'HazeSoft Pvt Ltd',
              'location' => 'Kathmandu',
              'contact' => '123456',
              'department_ids' => '["1"]',
            ],
            [
              'name' => 'Signi Pvt Ltd',
              'location' => 'Chitwan',
              'contact' => '1234567',
              'department_ids' => '["2"]',
            ],
            [
              'name' => 'Apple Pvt Ltd',
              'location' => 'Biratnagar',
              'contact' => '1234568',
              'department_ids' => '["1","2"]',
            ],
            [
              'name' => 'Ball Pvt Ltd',
              'location' => 'Banepa',
              'contact' => '1234569',
              'department_ids' => '["1"]',
            ],
        ];

        Company::insert($company);
    }
}
