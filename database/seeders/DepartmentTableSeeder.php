<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::truncate();

        $department =  [
            [
              'name' => 'Web Developer',
            ],
            [
              'name' => 'Web Designer',
            ],
            [
              'name' => 'SEO',
            ],
            [
              'name' => 'System Admin',
            ],
            [
              'name' => 'Admin',
            ],
        ];

        Department::insert($department);
    }
}
