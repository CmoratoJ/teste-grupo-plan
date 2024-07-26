<?php

namespace App\Http\Repositories\Course;

use App\Http\Repositories\Course\Interface\ICourseRepository;
use App\Models\Course;

class CourseRepository implements ICourseRepository
{
    public function delete(Course $course) {
        $course->delete();
    }
    
    public function findAll(): object {
        return Course::all();
    }
    
    public function findById(int $id) {
        return Course::find($id);
    }
       
    public function persist(Course $course): Course {
        $course->save();
        return $course;
    }
}
