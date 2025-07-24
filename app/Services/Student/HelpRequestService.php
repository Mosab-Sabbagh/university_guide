<?php

namespace App\Services\Student;

use App\Models\HelpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class HelpRequestService
{

public function getAllHelpRequests()
{
    $collegeId = Auth::user()->student->college_id;
    $universityId = Auth::user()->student->university_id; // الحصول على university_id
    $cacheKey = "help_requests_college_{$collegeId}_university_{$universityId}"; // تعديل المفتاح ليشمل الجامعة

    return Cache::remember($cacheKey, now()->addMinutes(30), function () use ($collegeId, $universityId) {
        return HelpRequest::where('college_id', $collegeId)
            ->where('university_id', $universityId) // إضافة شرط الجامعة
            ->with(['user', 'comments.user'])
            ->orderBy('created_at', 'desc')
            ->get();
    });
}



    public function store( $data)
    {
        DB::beginTransaction();
        try {
            $imagePath = isset($data['image'])
                ? $data['image']->store('help_requests', 'public')
                : null;

            $helpRequest = HelpRequest::create([
                'user_id'    => Auth::id(),
                'college_id' => Auth::user()->student?->college_id,
                'university_id' => Auth::user()->student?->university_id,
                'title'      => $data['title'],
                'content'    => $data['content'],
                'image'      => $imagePath,
            ]);

            DB::commit();

            // حذف الكاش بعد الإضافة
            $cacheKey = "help_requests_college_{$helpRequest->college_id}_university_{$helpRequest->university_id}";
            Cache::forget($cacheKey);
            return $helpRequest;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function updateHelpRequest( $id,  $data)
    {
        $helpRequest = HelpRequest::findOrFail($id);

        DB::beginTransaction();
        try {
            $helpRequest->update([
                'title' => $data['title'],
                'content' => $data['content'],
            ]);
            DB::commit();

            // حذف الكاش بعد التحديث
            $cacheKey = "help_requests_college_{$helpRequest->college_id}_university_{$helpRequest->university_id}";
            Cache::forget($cacheKey);

            return $helpRequest;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function deleteHelpRequest( $id)
    {
        $helpRequest = HelpRequest::findOrFail($id);

        DB::beginTransaction();
        try {
            $collegeId = $helpRequest->college_id;
            $helpRequest->delete();
            DB::commit();

            // حذف الكاش بعد الحذف
            $cacheKey = "help_requests_college_{$helpRequest->college_id}_university_{$helpRequest->university_id}";
            Cache::forget($cacheKey);
            
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
