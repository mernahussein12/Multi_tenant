<?php

 namespace App\Repositories;


 use App\Models\Course;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
 use Illuminate\Support\Facades\Mail;
 use Illuminate\Support\Str;

 class CourseRepository
 {
     public function createCourse($data)
     {
         $data['image'] = uploadImage($data['image']);
         $data['slug'] = Str::slug($data['name']['en']); // تعديل حسب اللغة المطلوبة
         $doctor = Auth::doctor();

         $course = $doctor->courses()->create($data);

         return $course;
     }

     public function getCourseById($id)
     {
         return Course::findOrFail($id);
     }

     public function getAllCourses($pagination = 10)
     {
         return Course::paginate($pagination);
     }

     public function updateCourse($id, $data)
     {
         $course = $this->getCourseById($id);

         if (isset($data['image'])) {
             $data['image'] = uploadImage($data['image']);
         }

         if (isset($data['name'])) {
             $data['slug'] = Str::slug($data['name']['en']); // تعديل حسب اللغة المطلوبة
         }

         $course->update($data);
         return $course;
     }

     public function deleteCourse($id)
     {
         $course = $this->getCourseById($id);
         return $course->delete();
     }

     protected function sendStatusNotification($email, $status)
     {
         Mail::to($email)->send(new \App\Mail\CourseStatusMail($status));
     }

     public function getActionCourse($course_id, $organization_id)
     {
         $organization = Organization::find($organization_id);

         if (!$organization) {
             return response()->json(['error' => 'Organization not found'], 404);
         }

         $course = $organization->courses()->find($course_id);

         if (!$course) {
             return response()->json(['error' => 'Course not found for this organization'], 404);
         }

         return response()->json([
             'course' => $course,
             'organization' => $organization
         ]);
     }
 }

