<?php

namespace App\Services\Student;

use App\Models\Summary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SummaryService
{
    public function clearSummaryCache()
    {
        $student = Auth::user()->student;
        $universityId = $student->university_id;
        $collegeId = $student->college_id;

        $cacheKey = "summaries_univ_{$universityId}_college_{$collegeId}";

        Cache::forget($cacheKey);
    }

    public function storeSummary($data)
    {
        $student = Auth::user()->student;

        $filePath = $data['file_path']->store('summaries', 'public');
        $summary = Summary::create([
            'user_id' => Auth::user()->id,
            'university_id' => $student->university_id,
            'college_id' => $student->college_id,
            'course_id' => $data['course_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'file_path' => $filePath,
        ]);
        // Clear the cache after storing a new summary
        $this->clearSummaryCache();
        return $summary;
    }

    public function getSummaryById($id)
    {
        $summary = Summary::findOrFail($id);
        if (!$summary) {
            abort(404, 'الملخص غير موجود');
        }
        return $summary;
    }

    public function getSummaries()
    {
        $student = Auth::user()->student;
        $query = Summary::where('university_id', $student->university_id)
            ->where('college_id', $student->college_id)
            ->with('course', 'user');

        if (request('search')) {
            $search = request('search');
            $query->where(function ($q) use ($search) {
                $q->whereHas('course', function ($q2) use ($search) {
                    $q2->where('name_ar', 'like', "%$search%");
                })->orWhere('title', 'like', "%$search%");
            });
        }

        return $query->orderBy('created_at', 'desc')->paginate(20);
    }

    public function getDownloadInfoById($id)
    {
        $summary = Summary::findOrFail($id);

        $filePath = storage_path('app/public/' . $summary->file_path);

        if (!file_exists($filePath)) {
            abort(404, 'الملف غير موجود');
        }

        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $filename = str_replace(['/', '\\', ':', '*', '?', '"', '<', '>', '|'], '-', $summary->title) . '.' . $extension;

        return [
            'path' => $filePath,
            'name' => $filename,
        ];
    }

    public function deleteSummary($id)
    {
        $summary = $this->getSummaryById($id);
        if ($summary) {
            $summary->delete();
            $this->clearSummaryCache();
            return true;
        }
        return false;
    }
}
