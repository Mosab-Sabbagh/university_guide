<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UniversityRequest;
use App\Services\UniversityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UniversityController extends Controller
{
    public $universityService;
    public function __construct(UniversityService $universityService)
    {
        $this->universityService = $universityService;
    }

    public function index()
    {
        $universities = $this->universityService->getAllUniversities();
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
        $university = $this->universityService->getUniversityById($university);
        return view('superAdmin.university.edit', compact('university'));
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
}