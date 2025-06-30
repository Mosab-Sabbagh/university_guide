<?php 
namespace App\Services\SuperAdmin;
use App\Models\College;
use App\Models\University;
use App\Models\Major;
use Illuminate\Support\Facades\DB;

class MajorService{
    public function getAllMajorsWithoutPagination()
    {
        return Major::get();
    }

    public function getAllMajors($search = null)
    {
        $query = Major::query();  

        if ($search) {
            $query->where('name_ar', 'like', '%' . $search . '%');
        }

        return $query->paginate(10)->withQueryString();
    }

    public function createMajor(array $data)
    {
        try {
            DB::beginTransaction();
            $major = Major::create($data);

            if (isset($data['colleges'])) {
                $major->colleges()->attach($data['colleges']);
            }

            DB::commit();
            return $major;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getMajorById($id)
    {
        return Major::findOrFail($id);
    }

    public function updateMajor(Major $major, array $data)
    {
        try {
            DB::beginTransaction();
            $result = $major->update($data);

            if (isset($data['colleges'])) {
                $major->colleges()->sync($data['colleges']);
            }

            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteMajor(Major $major)
    {
        try {
            DB::beginTransaction();
            $result = $major->delete();
            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}