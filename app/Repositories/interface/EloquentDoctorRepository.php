<?php

namespace App\Repositories\Eloquent;

use App\Models\Doctor;
use App\Repositories\Interfaces\DoctorRepositoryInterface;
use Illuminate\Http\JsonResponse;

class EloquentDoctorRepository implements DoctorRepositoryInterface
{
    public function all(): JsonResponse
    {
        return response()->json(Doctor::all());
    }

    public function find($id): JsonResponse
    {
        return response()->json(Doctor::findOrFail($id));
    }

    public function create(array $data): JsonResponse
    {
        $doctor = Doctor::create($data);
        return response()->json($doctor, 201); // 201: Created
    }

    public function update($id, array $data): JsonResponse
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->update($data);
        return response()->json($doctor);
    }

    public function delete($id): JsonResponse
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return response()->json(['message' => 'Doctor deleted successfully'], 200);
    }

    public function getAllDoctorsByOrganization($organization_id): JsonResponse
    {
        $doctors = Doctor::where('organization_id', $organization_id)->get();
        return response()->json($doctors);
    }
}
