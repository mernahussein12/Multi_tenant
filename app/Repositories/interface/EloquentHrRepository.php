<?php

namespace App\Repositories\Eloquent;

use App\Models\HR;
use App\Repositories\Interfaces\HRRepositoryInterface;
use Illuminate\Http\JsonResponse;

class EloquentHrRepository implements HRRepositoryInterface
{
    public function all(): JsonResponse
    {
        return response()->json(HR::all());
    }

    public function find($id): JsonResponse
    {
        return response()->json(HR::findOrFail($id));
    }

    public function create(array $data): JsonResponse
    {
        $hr = HR::create($data);
        return response()->json($hr, 201); // 201: Created
    }

    public function update($id, array $data): JsonResponse
    {
        $hr = HR::findOrFail($id);
        $hr->update($data);
        return response()->json($hr);
    }

    public function delete($id): JsonResponse
    {
        $hr = HR::findOrFail($id);
        $hr->delete();
        return response()->json(['message' => 'HR record deleted successfully'], 200);
    }

    public function getAllHRsByOrganization($organization_id): JsonResponse
    {
        $hrs = HR::where('organization_id', $organization_id)->get();
        return response()->json($hrs);
    }
}
