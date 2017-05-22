<?php
/**
 * Created by PhpStorm.
 * User: amrit
 * Date: 5/22/17
 * Time: 11:33 AM
 */

namespace App\Repositories\Course;


use App\Course;

class ElequentCourse implements CourseRepository
{

    /**
     * ElequentCourse constructor.
     */
    private $course;
    public function __construct(Course $course)
    {
        $this->course=$course;
    }

    public function getAll()
    {
     return  $this->course->all();
    }

    public function getById($id)
    {
      return  $this->course->find($id);
    }

    public function create($attributes)
    {
        // TODO: Implement create() method.
    }

    public function update($id, $attributes)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}