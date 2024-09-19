<?php

namespace App\Repositories;

use App\Models\Organization;

class OrganizationRepository
{
    /**
     * الحصول على جميع المنظمات.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllOrganizations()
    {
        return Organization::all();
    }

    /**
     * الحصول على منظمة بناءً على الـ ID.
     *
     * @param int $id
     * @return \App\Models\Organization
     */
    public function getOrganizationById($id)
    {
        return Organization::findOrFail($id);
    }

    /**
     * إنشاء منظمة جديدة.
     *
     * @param array $data
     * @return \App\Models\Organization
     */
    public function createOrganization($data)
    {
        return Organization::create($data);
    }

    /**
     * تحديث منظمة بناءً على الـ ID.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Organization
     */
    public function updateOrganization($id, $data)
    {
        $organization = Organization::findOrFail($id);
        $organization->update($data);
        return $organization;
    }

    /**
     * حذف منظمة بناءً على الـ ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteOrganization($id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();
        return true;
    }
}
