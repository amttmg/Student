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
        Course::truncate();
        $courses = [
            [
                'name'    => 'MBBS Preperation Class',
                'remarks' => 'NA',
            ],
            [
                'name'    => 'BSC AG Preperation Class',
                'remarks' => 'NA',
            ],
        ];
        foreach ($courses as $course) {
            $course = Course::create($course);
        }
    }
}
