<?php 
namespace App\Services\SuperAdmin;
use App\Models\College;
use Illuminate\Support\Facades\DB;
class CollegeService
{
    public function getAllCollegesWithoutPagination()
    {
        return College::with('university')->get();
    }

    public function getAllColleges( $search = null)
    {
        $query = College::with('university');

        if ($search) {
            $query->where('name_ar', 'like', '%' . $search . '%');
        }

        return $query->paginate( 10)->withQueryString();
    }

    public function createCollege(array $data)
    {
        return DB::transaction(function () use ($data) {
            $college = College::create($data);
            return $college;
        });
    }

    public function getCollegeById($id)
    {
        return College::findOrFail($id);
    }

    public function updateCollege(College $college, array $data)
    {
        try {
            DB::beginTransaction();
            $result = $college->update($data);
            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteCollege(College $college)
    {
        try {
            DB::beginTransaction();
            $result = $college->delete();
            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}