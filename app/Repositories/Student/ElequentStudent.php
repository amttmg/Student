<?php
/**
 * Created by PhpStorm.
 * User: amrit
 * Date: 5/22/17
 * Time: 10:01 AM
 */

namespace App\Repositories\Student;


use App\Student;

/**
 * Class ElequentStudent
 * @package App\Repositories\Student
 */
class ElequentStudent implements StudentRepository
{
    /**
     * ElequentStudent constructor.
     */
    private  $student;
    public function __construct(Student $student)
    {
        $this->student=$student;
    }

    public function getAll()
    {
      return $this->student->all();
    }

    public function getById($id)
    {
       return $this->student->find($id);
    }

    public function create($attributes)
    {
       return $this->student->create($attributes);
    }

    public function update($id, $attributes)
    {
       $student=$this->student->find($id);
       $student->update($attributes);
       return $student;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

}