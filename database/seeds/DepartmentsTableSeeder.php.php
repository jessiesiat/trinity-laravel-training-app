<?php

use App\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
        	'name' => 'College of Engineering',
        ]);

		Department::create([
        	'name' => 'College of Information Technology',
        ]);

        Department::create([
        	'name' => 'College of Arts & Sciences',
        ]);
    }
}
