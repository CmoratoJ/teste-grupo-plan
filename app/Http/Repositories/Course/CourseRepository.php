<?php

namespace App\Http\Repositories\Course;

use App\Http\Repositories\Course\Interface\ICourseRepository;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\User;
use DateTime;

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
        $courseUser = new CourseUser();

        $courseUser->user_id = $user->id;
        $courseUser->course_id = $course->id;
        $courseUser->initial_date = new DateTime();
        $courseUser->save();

        return $courseUser;
    }

    public function getCoursesInProgress()
    {
        $courses = Course::with('users')->get();

        $filteredCourses = $courses->filter(
            fn ($course) => $course->users->contains(
                fn ($user) => is_null($user->pivot->end_date)
            )
        );

        return $filteredCourses;
    }

    public function getCompletedCourses()
    {
        $courses = Course::with('users')->get();

        $filteredCourses = $courses->filter(
            fn ($course) => $course->users->contains(
                fn ($user) => !is_null($user->pivot->end_date)
            )
        );

        return $filteredCourses;
    }

    public function getPendingCourses()
    {
        $courses = Course::with('users')->get();

        $filteredCourses = $courses->filter(
            fn ($course) => !$course->users->contains(fn ($user) => $user)
        );
        
        return $filteredCourses;
    }

}
