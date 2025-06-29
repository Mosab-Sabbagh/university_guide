<?php 
namespace App\Services;
use App\Models\University;
use Illuminate\Support\Facades\DB;

class UniversityService
{
    public function getAllUniversities($perPage = 15)
    {
        return University::paginate($perPage);
    }

    public function getUniversityById($id)
    {
        return University::findOrFail($id);
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
}