<?php

namespace App\Http\Services;

use App\Http\Repositories\Course\Interface\ICourseRepository;
use App\Http\Repositories\User\Interface\IUserRepository;
use App\Http\Requests\AddUserInCourseRequest;
use App\Http\Requests\CreateOrUpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;

class CourseService
{
    private $courseRepository;
    private $userRepository;
    private $course;

    public function __construct(
        ICourseRepository $courseRepository, 
        IUserRepository $userRepository
    )
    {
        $this->courseRepository = $courseRepository;
        $this->userRepository = $userRepository;
        $this->course = new Course();
    }

    public function create(CreateOrUpdateCourseRequest $request) 
    {
        $this->course->name = $request->get('name');
        $this->courseRepository->persist($this->course);
        return new CourseResource($this->course);
    }

    public function findAll()
    {
        $courses = $this->courseRepository->findAll();
        return CourseResource::collection($courses);
    }

    public function findById(int $id)
    {
        $course = $this->courseRepository->findById($id);
        return new CourseResource($course);
    }

    public function update(CreateOrUpdateCourseRequest $request, int $id)
    {
        $course = $this->courseRepository->findById($id);

        $this->course->name = $request->get('name');
        $this->course->initialDate = $request->get('initialDate');
        $this->course->endDate = $request->get('endDate');
        return new CourseResource($course);
    }

    public function delete(int $id)
    {
        $course = $this->courseRepository->findById($id);
        $this->courseRepository->delete($course);
    }

    public function addUserInCourse(AddUserInCourseRequest $request)
    {
        $course = $this->courseRepository->findById($request->get('courseId'));
        $user = $this->userRepository->findById($request->get('userId'));
        
        $courseUser = $this->courseRepository->addUserInCourse($user, $course);
        return new CourseResource($courseUser);
    }
}
