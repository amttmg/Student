<?php
/**
 * Created by PhpStorm.
 * User: amrit
 * Date: 5/22/17
 * Time: 11:31 AM
 */

namespace App\Repositories\Course;


interface CourseRepository
{
    public function getAll();

    public function getById($id);

    public function create($attributes);

    public function update($id, $attributes);

    public function delete($id);
}