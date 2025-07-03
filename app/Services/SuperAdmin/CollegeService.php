<?php 
namespace App\Services\SuperAdmin;
use App\Models\College;
use Illuminate\Support\Facades\DB;
class CollegeService
{
    public function getAllCollegesWithoutPagination()
    {
        return College::get();
    }

    public function getAllColleges($search = null)
    {
        $query = College::query();

        if ($search) {
            $query->where('name_ar', 'like', "%{$search}%");
        }

        return $query->paginate(10)->withQueryString();
    }

    public function createCollege(array $data)
    {

        try {
            DB::beginTransaction();
            $college = College::create($data);
            
            if (isset($data['universities'])) {
                $college->universities()->attach($data['universities']);
            }

            DB::commit();
            return $college;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
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

            if (isset($data['universities'])) {
                $college->universities()->sync($data['universities']);
            }

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

    public function getCollegeWithRelations($id)
    {
        return College::with(['majors', 'universities'])->findOrFail($id);
    }

    public function getMajorsByCollegeId($id)
    {
        $college = College::with('majors')->findOrFail($id);
        return $college->majors;
    }

}