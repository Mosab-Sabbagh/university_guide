<?php

namespace App\Services\SuperAdmin;

use App\Models\College;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class CollegeService
{
    public function getAllCollegesWithoutPagination()
    {
        return Cache::remember('colleges_all', now()->addHours(1), function () {
            return College::get();
        });
    }

    public function getAllColleges($search = null)
    {
        if (!$search) {
            return Cache::remember('colleges_paginated', now()->addHours(1), function () {
                return College::paginate(10)->withQueryString();
            });
        }

        $query = College::query();
        $query->where('name_ar', 'like', "%{$search}%");

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

            // Forget relevant cache keys
            Cache::forget('colleges_all');
            Cache::forget('colleges_paginated');

            return $college;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getCollegeById($id)
    {
        return Cache::remember("college_{$id}", now()->addHours(1), function () use ($id) {
            return College::findOrFail($id);
        });
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

            // Forget relevant cache keys
            Cache::forget("college_{$college->id}");
            Cache::forget("college_with_relations_{$college->id}");
            Cache::forget("college_majors_{$college->id}");
            Cache::forget('colleges_all');
            Cache::forget('colleges_paginated');

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

            $id = $college->id;
            $result = $college->delete();

            DB::commit();

            // Forget relevant cache keys
            Cache::forget("college_{$id}");
            Cache::forget("college_with_relations_{$id}");
            Cache::forget("college_majors_{$id}");
            Cache::forget('colleges_all');
            Cache::forget('colleges_paginated');

            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getCollegeWithRelations($id)
    {
        return Cache::remember("college_with_relations_{$id}", now()->addHours(1), function () use ($id) {
            return College::with(['majors', 'universities'])->findOrFail($id);
        });
    }

    public function getMajorsByCollegeId($id)
    {
        return Cache::remember("college_majors_{$id}", now()->addHours(1), function () use ($id) {
            $college = College::with('majors')->findOrFail($id);
            return $college->majors;
        });
    }
}
