<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        $employees =  [
            [
              'name' => 'Dheeraj Aragariya',
              'employee_number' => '001',
              'email'   => 'test1@gmail.com',
              'contact' => '123456',
              'department' => '1',
            ],
            [
              'name' => 'Rupak Gupta',
              'employee_number' => '002',
              'email'   => 'test2@gmail.com',
              'contact' => '123456',
              'department' => '2',
            ],
            [
              'name' => 'Meera Sanak',
              'employee_number' => '003',
              'email'   => 'test3@gmail.com',
              'contact' => '123456',
              'department' => '4',
            ],
            [
              'name' => 'Steve Jobs',
              'employee_number' => '004',
              'email'   => 'test4@gmail.com',
              'contact' => '12345446',
              'department' => '3',
            ],
          ];

          Employee::insert($employees);
    }
}
