<?php


namespace App\Http\Controllers;

use App\Repositories\OrganizationRepository;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    protected $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepository)
    {
        $this->organizationRepository = $organizationRepository;
    }

    public function index()
    {
        $organizations = $this->organizationRepository->getAllOrganizations();
        return response()->json($organizations);
    }

    public function show($id)
    {
        $organization = $this->organizationRepository->getOrganizationById($id);
        return response()->json($organization);
    }

    public function store(Request $request)
    {
        $organization = $this->organizationRepository->createOrganization($request->all());
        return response()->json($organization, 201);
    }

    public function update(Request $request, $id)
    {
        $organization = $this->organizationRepository->updateOrganization($id, $request->all());
        return response()->json($organization);
    }

    public function destroy($id)
    {
        $this->organizationRepository->deleteOrganization($id);
        return response()->json(null, 204);
    }
}
