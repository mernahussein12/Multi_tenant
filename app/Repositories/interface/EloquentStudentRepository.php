<?php

namespace App\Repositories\Eloquent;

use App\Models\Student;
use App\Repositories\Interfaces\StudentRepositoryInterface;
use Illuminate\Http\JsonResponse;

class EloquentStudentRepository implements StudentRepositoryInterface
{
    public function all(): JsonResponse
    {
        return response()->json(Student::all());
    }

    public function find($id): JsonResponse
    {
        return response()->json(Student::findOrFail($id));
    }

    public function create(array $data): JsonResponse
    {
        $student = Student::create($data);
        return response()->json($student, 201); // 201: Created
    }

    public function update($id, array $data): JsonResponse
    {
        $student = Student::findOrFail($id);
        $student->update($data);
        return response()->json($student);
    }

    public function delete($id): JsonResponse
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully'], 200);
    }

    public function getAllStudentsByOrganization($organizationId): JsonResponse
    {
        $students = Student::where('organization_id', $organizationId)->get();
        return response()->json($students);
    }
}

