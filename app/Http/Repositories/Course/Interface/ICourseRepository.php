<?php

namespace App\Http\Repositories\Course\Interface;

use App\Models\Course;

interface ICourseRepository
{
    public function persist(Course $course): Course;
    public function findById(int $id);
    public function findAll():object;
    public function delete(Course $course);
}
