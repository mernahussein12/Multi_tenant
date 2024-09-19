<?php

namespace App\Http\Controllers;

use App\Repositories\CourseRepository;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->getAllCourses();
        return response()->json($courses);
    }

    public function store(CourseRequest $request)
    {
        $data = $request->validated();
        $course = $this->courseRepository->createCourse($data);
        return response()->json($course, 201);
    }

    // public function show($id)
    // {
    //     $course = $this->courseRepository->getCourseById($id);
    //     return response()->json($course);
    // }



    public function show($id)
    {

        $course = Course::findOrFail($id);

        $currentLang = app()->getLocale();

        $courseName = $course->getTranslation('name', $currentLang);
        $courseContent = $course->getTranslation('content', $currentLang);

        return response()->json([
            'name' => $courseName,
            'content' => $courseContent
        ]);
    }

    public function update(CourseRequest $request, $id)
    {
        $data = $request->validated();
        $course = $this->courseRepository->updateCourse($id, $data);
        return response()->json($course);
    }

    public function destroy($id)
    {
        $this->courseRepository->deleteCourse($id);
        return response()->json(['message' => 'Course deleted successfully.']);
    }

    public function getActionCourse(Request $request)
    {
        $course_id = $request->input('course_id');
        $organization_id = $request->input('organization_id');

        return $this->courseRepository->getActionCourse($course_id, $organization_id);
    }
}


