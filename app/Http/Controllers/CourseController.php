<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Course\CourseRepository;
use App\Http\Repositories\User\UserRepository;
use App\Http\Requests\AddUserInCourseRequest;
use App\Http\Requests\CreateOrUpdateCourseRequest;
use App\Http\Services\CourseService;

class CourseController extends Controller
{
    private CourseService $courseService;

    public function __construct()
    {
        $this->courseService = new CourseService(
            new CourseRepository, 
            new UserRepository
        );
    }

    public function index()
    {
        $courses = $this->courseService->findAll();
        return response()->json(['status' => true, 'courses' => $courses], 200);
    }

    public function store(CreateOrUpdateCourseRequest $request)
    {
        $course = $this->courseService->create($request);
        return response()->json(['status'=> true, 'course' => $course], 200);
    }

    public function show(int $id)
    {
        $course = $this->courseService->findById($id);
        return response()->json(['status'=> true,''=> $course],200);
    }

    public function update(CreateOrUpdateCourseRequest $request, int $id)
    {
        $course = $this->courseService->update($request, $id);
        return response()->json(['status'=> true,'course'=> $course],200);
    }

    public function destroy(int $id)
    {
        $this->courseService->delete($id);
        return response()->json(['status'=> true],200);
    }

    public function addUserInCourse(AddUserInCourseRequest $request)
    {
        $courseUser = $this->courseService->addUserInCourse($request);
        return response()->json(['status' => true, 'data' => $courseUser], 200);
    }
}
