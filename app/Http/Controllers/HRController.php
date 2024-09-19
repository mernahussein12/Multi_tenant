<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Interfaces\HRRepositoryInterface;

class HRController extends Controller
{
    protected $hrRepository;

    public function __construct(HRRepositoryInterface $hrRepository)
    {
        $this->hrRepository = $hrRepository;
    }

    public function index()
    {
        return $this->hrRepository->all();
    }

    public function show($id)
    {
        return $this->hrRepository->find($id);
    }

    public function store(Request $request)
    {
        return $this->hrRepository->create($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->hrRepository->update($id, $request->all());
    }

    public function destroy($id)
    {
        return $this->hrRepository->delete($id);
    }

    public function getAllHRsByOrganization($organization_id)
    {
        return $this->hrRepository->getAllHRsByOrganization($organization_id);
    }
}

