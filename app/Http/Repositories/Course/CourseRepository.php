<?php

namespace App\Http\Repositories\Course;

use App\Http\Repositories\Course\Interface\ICourseRepository;
use App\Models\Course;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\DB;

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

    public function addUserInCourse(User $user, Course $course)
    {
        DB::table('course_user')->insert([
            'course_id' => $course->id,
            'user_id' => $user->id,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        return User::with('courses')->where('id', $user->id)->get();
    }
}
