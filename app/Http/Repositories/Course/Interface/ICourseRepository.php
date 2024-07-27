<?php

namespace App\Http\Repositories\Course\Interface;

use App\Models\Course;
use App\Models\User;

interface ICourseRepository
{
    public function persist(Course $course): Course;
    public function findById(int $id);
    public function findAll():object;
    public function delete(Course $course);
    public function addUserInCourse(User $user, Course $course);
}
