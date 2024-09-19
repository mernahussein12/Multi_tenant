<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\StudentRepositoryInterface;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function index()
    {
        return $this->studentRepository->all();
    }

    public function show($id)
    {
        return $this->studentRepository->find($id);
    }

    public function store(Request $request)
    {
        return $this->studentRepository->create($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->studentRepository->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->studentRepository->delete($id);
    }

    public function getAllStudentsByOrganization($organizationId)
    {
        return $this->studentRepository->getAllStudentsByOrganization($organizationId);
    }
}

