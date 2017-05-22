<?php

/**
 * Created by PhpStorm.
 * User: amrit
 * Date: 5/22/17
 * Time: 9:57 AM
 */
namespace App\Repositories\Student;
interface StudentRepository
{
    public function getAll();

    public function getById($id);

    public function create($attributes);

    public function update($id, $attributes);

    public function delete($id);
}