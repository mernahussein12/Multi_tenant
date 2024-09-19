<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\DoctorRepositoryInterface;

class DoctorController extends Controller
{
    protected $doctorRepository;

    public function __construct(DoctorRepositoryInterface $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function index()
    {
        return $this->doctorRepository->all();
    }

    public function show($id)
    {
        return $this->doctorRepository->find($id);
    }

    public function store(Request $request)
    {
        return $this->doctorRepository->create($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->doctorRepository->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->doctorRepository->delete($id);
    }
    
    public function getAllDoctorsByOrganization($organization_id)
    {
        return $this->doctorRepository->getAllDoctorsByOrganization($organization_id);
    }
}

