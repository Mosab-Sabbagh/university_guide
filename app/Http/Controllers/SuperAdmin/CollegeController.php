<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CollegeRequest;
use App\Models\College;
use App\Services\SuperAdmin\CollegeService;
use App\Services\SuperAdmin\UniversityService;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    public $collegeService;
    public function __construct(CollegeService $collegeService)
    {
        $this->collegeService = $collegeService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $colleges = $this->collegeService->getAllColleges($search);
        return view('superAdmin.college.index', compact('colleges'));
    }

    public function create(UniversityService $universityService)
    {
        $universities= $universityService->getAllUniversitiesWithoutPagination();
        return view('superAdmin.college.create',compact('universities'));
    }

    public function store(CollegeRequest $request)
    {
        $validatedData = $request->validated();
        try {
            $this->collegeService->createCollege($validatedData);
            return redirect()
                ->route('super_admin.college.index')
                ->with('success', 'تم إضافة الكلية بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة الكلية: ' );
        }
        
    }

    public function edit($college, UniversityService $universityService)
    {
        try {
            $college = $this->collegeService->getCollegeById($college);
            $universities = $universityService->getAllUniversitiesWithoutPagination();
            return view('superAdmin.college.edit', compact('college', 'universities'));
        } catch (\Exception $e) {
            return redirect()
                ->route('super_admin.college.index')
                ->with('error', 'حدث خطأ أثناء جلب بيانات الكلية: ' );
        }
    }

    public function update(CollegeRequest $request, $college)
    {
        $validatedData = $request->validated();
        try {
            $college = $this->collegeService->getCollegeById($college);
            $this->collegeService->updateCollege( $college ,$validatedData);
            return redirect()
                ->route('super_admin.college.index')
                ->with('success', 'تم تعديل الكلية بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error',  'حدث خطأ أثناء تعديل الكلية: ' );
        }
    }

    public function destroy($college)
    {
        try {
            $college = $this->collegeService->getCollegeById($college);
            $this->collegeService->deleteCollege($college);
            return redirect()
                ->route('super_admin.college.index')
                ->with('success', 'تم حذف الكلية بنجاح');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'حدث خطأ أثناء حذف الكلية: ' );
        }
    }
}
