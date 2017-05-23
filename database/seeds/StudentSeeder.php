<?php

use Illuminate\Database\Seeder;
use \App\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Student::create([
            'name'    => 'Amrit Tamang',
            'address' => 'Lalitpur',
            'phone'   => '9842411793',
            'email'   => 'amt.tmg@gmail.com',
            'user_id' => 1,
        ]);
        $student->courses()->attach([1, 2]);
    }
}
