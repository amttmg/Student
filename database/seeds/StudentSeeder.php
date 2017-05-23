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
        $fake= Faker\Factory::create();
        Student::truncate();
        DB::table('course_student')->truncate();
        for ($i=1;$i<10;$i++)
        {
            $student = Student::create([
                'name'    => $fake->name,
                'address' => $fake->address,
                'phone'   => $fake->phoneNumber,
                'email'   => $fake->email,
                'user_id' => 1,
            ]);
            $student->courses()->attach([$fake->numberBetween(1,2)]);
        }
    }
}
