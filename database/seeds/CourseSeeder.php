<?php

use Illuminate\Database\Seeder;
use \App\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
                'name'    => 'MBBS Preperation Class',
                'remarks' => 'NA',
            ],
            [
                'name'    => 'MBBS Preperation Class',
                'remarks' => 'NA',
            ],
        ];
        foreach ($courses as $course) {
            $course = Course::create($course);
        }
    }
}
