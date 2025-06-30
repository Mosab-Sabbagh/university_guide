<?php 
namespace App\Services\SuperAdmin;
use App\Models\College;
use App\Models\University;
use App\Models\Major;
use Illuminate\Support\Facades\DB;

class MajorService{
    public function getAllMajorsWithoutPagination()
    {
        return Major::with('college.university')->get();
    }

    public function getAllMajors($search = null)
    {
        // تحديد الاستعلام مع العلاقات college (major) و university (college)
        $query = Major::with('college.university');

        if ($search) {
            $query->where('name_ar', 'like', '%' . $search . '%');
        }

        return $query->paginate(10)->withQueryString();
    }

    public function createMajor(array $data)
    {
        return DB::transaction(function () use ($data) {
            $major = Major::create($data);
            return $major;
        });
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