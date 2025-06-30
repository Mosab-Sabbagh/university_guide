<?php 
namespace App\Services\SuperAdmin;
use App\Models\University;
use Illuminate\Support\Facades\DB;

class UniversityService
{
    public function getAllUniversities($search = null)
    {
        $query = University::query();

        if ($search) {
            $query->where('name_ar', 'like', '%' . $search . '%');
        }

        return $query->paginate(10)->withQueryString();
    }

    public function getAllUniversitiesWithoutPagination()
    {
        return University::get(); 
    }

    public function getUniversityById($id)
    {
        try {
            return University::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw $e;
        }
    }

    public function createUniversity(array $data)
    {
        try {
            DB::beginTransaction();
            $university = University::create($data);
            DB::commit();
            return $university;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateUniversity(University $university, array $data)
    {
        try {
            DB::beginTransaction();
            $result = $university->update($data);
            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteUniversity(University $university)
    {
        try {
            DB::beginTransaction();
            $result = $university->delete();
            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getUniversityWithDetails($university): University
    {
        return University::with(['colleges.majors'])->findOrFail($university);
    }
}