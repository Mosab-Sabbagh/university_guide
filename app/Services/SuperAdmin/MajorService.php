<?php

namespace App\Services\SuperAdmin;

use App\Models\College;
use App\Models\University;
use App\Models\Major;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class MajorService
{
    public function getAllMajorsWithoutPagination()
    {
        return Cache::remember('majors_all', now()->addHour(), function () {
            return Major::get();
        });
    }

    public function getAllMajors($search = null)
    {
        if (!$search) {
            return Cache::remember('majors_paginated', now()->addHour(), function () {
                return Major::paginate(10)->withQueryString();
            });
        }

        $query = Major::query();

        $query->where('name_ar', 'like', '%' . $search . '%');

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

            // حذف الكاش
            Cache::forget('majors_all');
            Cache::forget('majors_paginated');

            return $major;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function getMajorById($id)
    {
        return Cache::remember("major_{$id}", now()->addHour(), function () use ($id) {
            return Major::findOrFail($id);
        });
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

            // حذف الكاش المرتبط
            Cache::forget("major_{$major->getKey()}");
            Cache::forget('majors_all');
            Cache::forget('majors_paginated');

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

            $id = $major->getKey();
            $result = $major->delete();

            DB::commit();

            // حذف الكاش المرتبط
            Cache::forget("major_{$id}");
            Cache::forget('majors_all');
            Cache::forget('majors_paginated');

            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
