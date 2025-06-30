<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UniversityRequest;
use App\Models\University;
use App\Services\SuperAdmin\UniversityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UniversityController extends Controller
{
    public $universityService;
    public function __construct(UniversityService $universityService)
    {
        $this->universityService = $universityService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $universities = $this->universityService->getAllUniversities($search);
        return view('superAdmin.university.index',compact('universities'));
    }

    public function create()
    {
        return view('superAdmin.university.create');
    }

    public function store(UniversityRequest $request)
    {
        try {
            $validatedData = $request->validated();
            
            $this->universityService->createUniversity($validatedData);
            
            return redirect()
                ->route('super_admin.university.index')
                ->with('success', 'تم إضافة الجامعة بنجاح');
                
        } catch (\Exception $e) {
            Log::error('Error creating university: ' . $e->getMessage(), [
                'request' => $request->all(),
                'exception' => $e,
            ]);
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة الجامعة: ' );
        }
    }

    public function edit($university)
    {
        try {
            $university = $this->universityService->getUniversityById($university);
            return view('superAdmin.university.edit', compact('university'));
        } catch (\Exception $e) {
            Log::error('Error fetching university for edit: ' . $e->getMessage(), [
                'university_id' => $university,
                'exception' => $e,
            ]);
            return redirect()
                ->route('super_admin.university.index')
                ->with('error', 'حدث خطأ أثناء جلب بيانات الجامعة للتعديل: ');
        }
    }

    public function update(UniversityRequest $request, $university)
    {
        try {
            $validatedData = $request->validated();
            $university = $this->universityService->getUniversityById($university);
            $this->universityService->updateUniversity($university, $validatedData);
            
            return redirect()
                ->route('super_admin.university.index')
                ->with('success', 'تم تحديث الجامعة بنجاح');
                
        } catch (\Exception $e) {
            Log::error('Error updating university: ' . $e->getMessage(), [
                'request' => $request->all(),
                'exception' => $e,
            ]);
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث الجامعة: ' );
        }
    }

    public function destroy($university)
    {
        try {
            $university = $this->universityService->getUniversityById($university);
            $this->universityService->deleteUniversity($university);
            
            return redirect()
                ->route('super_admin.university.index')
                ->with('success', 'تم حذف الجامعة بنجاح');
                
        } catch (\Exception $e) {
            Log::error('Error deleting university: ' . $e->getMessage(), [
                'exception' => $e,
            ]);
            
            return redirect()
                ->back()
                ->with('error', 'حدث خطأ أثناء حذف الجامعة: ' );
        }
    }

    /**
     * عرض جامعة محددة مع الكليات والتخصصات
     */
    public function show($university)
    {
        try {
            $university = $this->universityService->getUniversityWithDetails($university);
            return view('superAdmin.university.show', compact('university'));

        } catch (\Exception $e) {
            return redirect()
                ->route('super_admin.university.index')
                ->with('error', 'حدث خطأ أثناء جلب بيانات الجامعة.');
        }
    }
}